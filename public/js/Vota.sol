pragma solidity >=0.5.0 <0.7.0;


contract Votar {
    struct Propuesta {
        string nombre;
        bool activa;
        address autor;
        uint votos;
    }

    string public tema;
    address public owner;
    Propuesta[] public propuestas;
    mapping(address => uint) public votos;
    bool public votacionActiva = true;
    uint public noVotosDelGanadaor = 0;

    event Voto(address indexed _votante, uint _propuesta, string _nombre);
    event Propuestas(uint indexed _id, string nombre, address autor);


    constructor(string memory _tema) public {
        Propuesta memory _zerofix = Propuesta('Zero fix', false, msg.sender, 0);

        owner = msg.sender;
        tema = _tema;
        propuestas.push(_zerofix);
    }


    function votar(uint indice) public {
        Propuesta storage propuesta = propuestas[indice];
        uint votoPrevioId = votos[msg.sender];
        Propuesta storage votoPrevio = propuestas[votoPrevioId];

        require(votacionActiva, "La votacion aun no esta activa o ha finalizado");
        require(propuesta.activa, "La propuesta no existe o fue desactivada");


        if (votoPrevioId > 0) {
            votoPrevio.votos -= 1;
        }

        propuesta.votos += 1;

        if (propuesta.votos > noVotosDelGanadaor) {
            noVotosDelGanadaor = propuesta.votos;
        }
        votos[msg.sender] = indice;

        emit Voto(msg.sender, indice, propuesta.nombre);
    }

    function obtenerVoto(address votante) public view returns (uint prupuestaId, string memory nombre) {
        uint votoId = votos[votante];
        Propuesta memory propuesta = propuestas[votoId];

        prupuestaId = votoId;
        nombre = propuesta.nombre;
    }


    function obtenerPropuesta(uint indiceDePropuesta) public view returns (string memory _nombre, bool _activa, address _autor, uint _votos) {
        Propuesta memory propuesta = propuestas[indiceDePropuesta];
        require(indiceDePropuesta > 0, 'El indice debe ser mayor a cero');
        require(indiceDePropuesta < propuestas.length, 'La propuesta no existe');

        _nombre = propuesta.nombre;
        _activa = propuesta.activa;
        _autor = propuesta.autor;
        _votos = propuesta.votos;
    }

    function agregarPropuesta(string memory nombre) public {
        Propuesta memory nuevaPropuesta = Propuesta(nombre, true, msg.sender, 0);
        propuestas.push(nuevaPropuesta);
        emit Propuestas(propuestas.length - 1, nombre, msg.sender);
    }

    function cambiarEstadoDePropuesta(uint indiceDePropuesta, bool status) public {
        Propuesta storage propuesta = propuestas[indiceDePropuesta];

        require(msg.sender == owner, 'Deber ser el owner del contrato');
        require(indiceDePropuesta > 0, 'El indice debe ser mayor a cero');
        require(indiceDePropuesta < propuestas.length, 'La propuesta no existe');

        propuesta.activa = status;

    }

    function estadoDeVotacion(bool status) public {
        require(msg.sender == owner, 'Deber ser el owner del contrato');
        votacionActiva = status;
    }

    function propuestasGanadoras() public view returns (uint[] memory) {
        uint[] memory propuestasMasVotadas = new uint[](propuestas.length);
        uint indiceDeGanadores = 0;

        for (uint indice = 1; indice < propuestas.length; indice++) {
            if (propuestas[indice].votos >= noVotosDelGanadaor) {
                propuestasMasVotadas[indiceDeGanadores] = indice;
                indiceDeGanadores += 1;
            }
        }
        return propuestasMasVotadas;
    }
}
