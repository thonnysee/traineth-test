<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Traineth</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
            @-webkit-keyframes stripe-slide {
                0% {
                    background-position: 0% 0;
                }
                100% {
                    background-position: 100% 0;
                }
            }
            @keyframes stripe-slide {
                0% {
                    background-position: 0% 0;
                }
                100% {
                    background-position: 100% 0;
                }
            }


            .btn {
                overflow: visible;
                margin: 0;
                margin-top: 20px;
                padding: 0;
                border: 0;
                background: transparent;
                font: inherit;
                line-height: normal;
                cursor: pointer;
                -moz-user-select: text;
                display: block;
                text-decoration: none;
                text-transform: uppercase;
                padding: 4px 6px 7px;
                background-color: #fff;
                color: #666;
                border: 2px solid #666;
                border-radius: 6px;
                margin-bottom: 16px;
                -webkit-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }
            .btn:-moz-focus-inner {
                padding: 0;
                border: 0;
            }
            .btn--stripe {
                overflow: hidden;
                position: relative;
            }
            .btn--stripe:after {
                content: "";
                display: block;
                height: 7px;
                width: 100%;
                background-image: repeating-linear-gradient(45deg, #666, #666 1px, transparent 2px, transparent 5px);
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                border-top: 1px solid #666;
                position: absolute;
                left: 0;
                bottom: 0;
                background-size: 7px 7px;
            }
            .btn--stripe:hover {
                background-color: #666;
                color: #fff;
                border-color: #000;
            }
            .btn--stripe:hover:after {
                background-image: repeating-linear-gradient(45deg, #fff, #fff 1px, transparent 2px, transparent 5px);
                border-top: 1px solid #000;
                -webkit-animation: stripe-slide 12s infinite linear forwards;
                animation: stripe-slide 12s infinite linear forwards;
            }
            .btn--large {
                width: 50%;
            }
            .btn--radius {
                border-radius: 36px;
            }

        </style>
        @livewireStyles
    </head>
    <body class="antialiased">
    @livewireScripts
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">


                <div class="ml-4 text-lg leading-7 font-semibold"><a href="#" class="underline text-gray-900 dark:text-white deployment">Deploy TrainETH</a></div>
                <livewire:courses-view />


                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Build v{{ Illuminate\Foundation\Application::VERSION }}
                    </div>
                </div>
            </div>
        </div>
    <input class='contracts' type="hidden" data-traineth_abi="{{asset('/js/traineth_abi.json')}}"
           data-traineth_bytecode="{{asset('/js/traineth_bytecode.json')}}">
    </body>
    <script src='{{asset('/js/blockies.js')}}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.3.0/web3.min.js"></script>

    <script >
        //let direccionVotos = "0x1DFDFe10184797aB806373DBb77c1013D52aa95B";
        let addressTraineth = "";
        let tema;
        let trainethContrato;
        let account;

        $(document).ready(async () => {
            console.log('settings init');

            const trainethABI = await fetch($('.contracts').data('traineth_abi')).then(r => r.json());
            const trainethBytecode = await fetch($('.contracts').data('traineth_bytecode')).then(r => r.json());
            console.log('contract files loaded');
            // Validar if un proveedor ha sido agregado por el navegador o alguna extension
            if (typeof web3 !== 'undefined') {
                window.web3 = new Web3(web3.currentProvider);
            } else { // fallback
                window.web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
            }

            if (window.ethereum) {
                window.ethereum.autoRefreshOnNetworkChange = false;
                await ethereum.enable();
            }

            // Obtener direccion
            const addresses = await web3.eth.getAccounts();
            account = addresses[0];

            console.log(account)


            // Interaccion con contratos
            const trainethContract = new web3.eth.Contract(trainethABI);

            if (addressTraineth) {
                trainethContrato = new web3.eth.Contract(trainethABI, addressTraineth);
                suscribirseRegistrocurso(trainethABI);
                suscribirseCertificacion(trainethABI);


            } else  {
                // Crear votacion
                $('.deployment').on('click', async () => {

                    const deployTraineth = trainethContract
                        .deploy({
                            data: trainethBytecode.object,
                        })

                    const estimarGas = await deployTraineth.estimateGas();
                    console.log(estimarGas)

                    let parametros = {
                        from: account,
                        gas: web3.utils.toHex(estimarGas + 200000),
                        gasPrice: web3.utils.toHex(web3.utils.toWei('1', 'gwei'))
                    }

                    deployTraineth.send(parametros, function(error, transactionHash){
                        console.log('-------- TX --------')
                        console.log(transactionHash)
                    })
                        .on('error', function(error){
                            console.log('-------- ERROR --------')
                            console.log(error)

                        })
                        .on('transactionHash', function(transactionHash){
                            console.log('-------- TX hash --------')
                            console.log(transactionHash)
                        })
                        .on('receipt', function(receipt){
                            console.log('-------- RECEIPT --------')
                            console.log(receipt)
                        })
                        .on('confirmation', function(confirmationNumber, receipt){
                            console.log('-------- CONFIRMAION Seguimos conectados :D --------')
                            console.log(receipt.contractAddress)
                            addressTraineth = receipt.contractAddress
                        })
                        .then(function(newContractInstance){
                            console.log('-------- NUEVO CONTRATO --------')
                            console.log(newContractInstance.options.address)
                            trainethContrato = newContractInstance
                            suscribirseRegistrocurso(trainethABI);
                            suscribirseCertificacion(trainethABI);

                            trainethContrato.methods.register().send({
                                from: account
                            }, (error, txHash) => {
                                if (!error) {
                                   //alert(`Registro de usuario`)
                                    console.log('Cuenta registrada correctamente en contrato');
                                    console.log(txHash)
                                } else {
                                    alert('Error, ver en la consola')
                                    console.log(error)
                                }
                            })

                            // trainethContrato.methods.register().call({from: account})
                            //     .then(function(result){
                            //         console.log('Cuenta registrada correctamente');
                            //     });
                            $('#nuevaPropuesta').css( "display", "block" );;
                            // instance with the new contract address
                        });
                })
            }

            $('.enroll').on('click', async (event) => {

                if (!trainethContrato) return;
                let curso = event.currentTarget.getAttribute("data-identifier");
                await registrarCurso(curso);
                console.log("enroll");

                await trainethContrato.methods.enroll(parseInt(curso)).send({
                    from: account
                }, (error, txHash) => {
                    if (!error) {
                        alert(`Te has inscrito correctamente al curso`)
                        console.log(txHash)
                    } else {
                        alert('Error, ver en la consola')
                        console.log(error)
                    }
                })
            })

            $('.certificate').on('click', async (event) => {

                if (!trainethContrato) return;
                let curso = event.currentTarget.getAttribute("data-identifier");
                console.log("certificar");

                trainethContrato.methods.certify(parseInt(curso)).send({
                    from: account
                }, (error, txHash) => {
                    if (!error) {
                        alert(`Te has certificado correctamente`)
                        console.log(txHash)
                    } else {
                        alert('Error, ver en la consola')
                        console.log(error)
                    }
                })
            })

            $('.getCertificate').on('click', async (event) => {

                if (!trainethContrato) return;
                let curso = event.currentTarget.getAttribute("data-identifier");
                console.log("obtener cert");

                trainethContrato.methods.getCourseStatus(curso).call({from: account})
                    .then(function(result){
                        console.log(result);
                        $('.aqui-curso').append(result[0]);
                    });

                trainethContrato.methods.getCertificate(curso).call({from: account})
                    .then(function(result){
                        console.log(result);
                        $('.aqui-cert').append(result[0]);
                    });

                trainethContrato.methods.certify(parseInt(curso)).send({
                    from: account
                }, (error, txHash) => {
                    if (!error) {
                        alert(`Te has certificado correctamente`)
                        console.log(txHash)
                    } else {
                        alert('Error, ver en la consola')
                        console.log(error)
                    }
                })
            })

            // Eventos

        })

        // trainethContrato.methods.getCourseStatus(4).call({from: account})
        //     .then(function(result){
        //     console.log(result);
        //     });
        const transactionReceipt = async (txnHash) => {
            let transactionReceipt = null
            while (transactionReceipt == null) {
                transactionReceipt = await web3.eth.getTransactionReceipt(txnHash);
                await sleep(1000);
            }

            return transactionReceipt;
        };

        const sleep = (milliseconds) => {
            return new Promise(resolve => setTimeout(resolve, milliseconds))
        }


        /*const obtenerPropuestas = (trainethABI) => {
            trainethContrato.getPastEvents("Curso", {
                fromBlock: 0,
                toBlock: 'latest'
            }).then(events => {
                console.log(trainethABI[4])
                events.forEach(e => {
                    const decoded = web3.eth.abi.decodeLog(trainethABI[1]['inputs'], e.raw.data, [
                        e.raw.topics[1],
                        e.raw.topics[0]
                    ]);
                    const blockie = document.blockies.create({seed: decoded[1]})
                    $('#propuestas ul').append(`
      <li data-id=${decoded[0]}>
        ${decoded[1]}
        <small> agregada por <span id='propuesta-${decoded[0]}'> <span> ${decoded[1]} </small> <br>
        <button class='btn btn-success' onclick='votar(${decoded[0]})'> Votar</button>
       </li>`)
                    $(`#propuesta-${decoded[0]}`).append(blockie)
                    console.log(decoded)
                })
            })
        }*/

        const suscribirseRegistrocurso = (trainethABI) => {
            trainethContrato.events.registerCourseEvent({
                //   filter: { _id: '' } // parametros indexados
                fromBlock: 'latest'
            }).on('connected', function() {
                console.log('**** Curso Registrado ****')
            }).on('data', function(e) {
                const decoded = web3.eth.abi.decodeLog(trainethABI[1]['inputs'], e.raw.data, [
                    e.raw.topics[1],
                    e.raw.topics[2],
                    e.raw.topics[0]
                ]);

      //           const blockie = document.blockies.create({seed: decoded[2]})
      //
      //           $('#propuestas ul').append(`
      // <li data-id=${decoded[0]}>
      //   ${decoded[1]}
      //   <small> agregada por <span id='propuesta-${decoded[0]}'> <span> ${decoded[2]} </small> <br>
      //   <button class='btn btn-success' onclick='votar(${decoded[0]})'> Votar</button>
      //  </li>`)
      //           $(`#propuesta-${decoded[0]}`).append(blockie)
             })
        }

        const suscribirseCertificacion = (trainethABI) => {
            $('#votos li').remove();

            trainethContrato.events.certificateEvent({
                //   filter: { _id: '' } // parametros indexados
                fromBlock: 0
            }).on('connected', function() {
                console.log('**** Suscrito a Emicion de Certificados ****')
            }).on('data', function(e) {
                const decoded = web3.eth.abi.decodeLog(trainethABI[2]['inputs'], e.raw.data, [
                    e.raw.topics[1],
                    e.raw.topics[2],
                    e.raw.topics[0]
                ]);


      //           $('#votos ul').append(`
      // <li><span id='voto-${decoded[0]}'> <span> ${decoded[0]} ha votado la propuesta
      //   (${decoded[1]}) ${decoded[2]}
      //  </li>`)
      //
             })
        }

        const registrarCurso = (courseId) => {
            if (account) {
                trainethContrato.methods.registerCourse(courseId).send({
                    from: account
                }, (error, txHash) => {
                    if (!error) {
                        alert(`Registro de curso exitoso`)
                        console.log(txHash)
                    } else {
                        alert('Error, ver en la consola')
                        console.log(error)
                    }
                })
            }
        }

    </script>
</html>
