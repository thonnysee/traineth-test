pragma solidity ^0.6.0;

contract Traineth{

    struct Courses {
        uint id;
        bool isActive;
        uint cerification;
        bool certified;
        address owner;
    }

    struct Certifications{
        uint courseId;
        bool active;
        bool enrolled;
    }

    struct Users{
        address owner;
        bool isActive;
        mapping(uint => Certifications) certification;
    }

    event certificateEvent(
        uint indexed courseId,
        bool indexed success
    );
    event registerEvent(
        bool indexed success
    );
    event registerCourseEvent(
        uint indexed courseId,
        bool indexed success
    );
    event enrollEvent(
        uint indexed courseId,
        bool indexed success
    );
    address public authorizedPersonal;

    mapping(address => Users) public user;
    mapping(uint => Courses) public course;

    constructor() public {
        authorizedPersonal = msg.sender;
    }

    modifier onlyPersonalAuthorized {
        require(authorizedPersonal == msg.sender, "You are not allowed.");
        _;
    }
    modifier onlyActiveUsers {
        require(user[msg.sender].isActive == true, "La cuenta no esta activa.");
        _;
    }

    modifier userOwner {
        require(user[msg.sender].owner == msg.sender, "No es tu cuenta.");
        _;
    }

    modifier courseActive(uint _courseId) {
        require(course[_courseId].isActive == true, "El curso no existe");
        _;
    }




    function register() public {
        //require(user[msg.sender].owner != msg.sender, "Ya existe la cuenta.");
        Users memory _newUser;
        _newUser.isActive = true;
        _newUser.owner = msg.sender;
        user[msg.sender] = _newUser;
        user[msg.sender].certification[0];
        emit registerEvent(true);
    }

    function registerCourse(uint _courseId ) public{
        //require(course[_courseId].isActive == false, "El curso ya existe."); //bytes4(0x0)
        Courses memory _newCourse;
        _newCourse.isActive = true;
        _newCourse.id = _courseId;
        _newCourse.cerification = _courseId;
        _newCourse.certified = true;
        _newCourse.owner = msg.sender;
        course[_courseId] = _newCourse;
        emit registerCourseEvent(_courseId, true);
    }

    function enroll(uint _courseId) public courseActive(_courseId) {
        //require(user[msg.sender].certification[_courseId].enrolled == false, "Ya estas en el curso");
        user[msg.sender].certification[_courseId].active = false;
        user[msg.sender].certification[_courseId].courseId = _courseId;
        user[msg.sender].certification[_courseId].enrolled = true;
        emit enrollEvent(_courseId, true);
    }

    function certify(uint _courseId) public userOwner courseActive(_courseId) {
        if(user[msg.sender].certification[_courseId].active == false && user[msg.sender].certification[_courseId].enrolled == true ) {
           user[msg.sender].certification[_courseId].active = true;
           emit certificateEvent(_courseId, true);
        }
    }

    function getCertificate(uint _courseId) view  public   courseActive(_courseId) returns (bool _success, uint _certification) {
        _success = false;
        _certification = 0;

        if(user[msg.sender].certification[_courseId].active == true && user[msg.sender].certification[_courseId].enrolled == true ) {
            _success = true;
            _certification = course[_courseId].cerification;
        }
    }

    function getCourseStatus(uint _courseId) view public
          courseActive(_courseId)
        returns (bool _statusCourse){

        require(user[msg.sender].certification[_courseId].enrolled == true, "No tienes este curso");

        _statusCourse = true;
    }




}
