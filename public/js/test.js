let direccionVotos = "0x1DFDFe10184797aB806373DBb77c1013D52aa95B";
let tema;
let votosContrato;
const propuestas = {};
let account;

$(document).ready(async () => {
    console.log('ready');
    $('#nuevaPropuesta').css( "display", "none" );

    const votosABI = await fetch('votos_abi.json').then(r => r.json());
    const votosBytecode = await fetch('votos_bytecode.json').then(r => r.json());

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
    const fabricaVotosContract = new web3.eth.Contract(votosABI);

    if (direccionVotos) {
        $('#nuevaVotacion').remove();
        votosContrato = new web3.eth.Contract(votosABI, direccionVotos);
        $('#nuevaPropuesta').css( "display", "block" );;
        obtenerPropuestas(votosABI);
        suscribirsePropuestas(votosABI);
        suscribirseVotos(votosABI);

        const tema = await votosContrato.methods.tema().call();
        $('#tema').text(tema);

        const ganador = await votosContrato.methods.propuestasGanadoras().call();
        $('#ganador_actual').text(ganador);
        /*votosContrato.methods.propuestasGanadoras().send({
          from: account
        },(error, txHash) => {
          if(!error){
            console.log('llamada hecha');
          }
        }
        ).on('receipt', (receipt) => console.log(receipt));
        $('#ganador_actual').text(ganador[0]);*/
    } else  {
        // Crear votacion
        $('#deployVotacion').on('click', async () => {
            const tema = $('#tema').val();
            $('#deployVotacion').prop('disabled', true)


            const deployVotos = fabricaVotosContract
                .deploy({
                    data: votosBytecode.object,
                    arguments: [tema]
                })

            const estimarGas = await deployVotos.estimateGas();
            console.log(estimarGas)

            let parametros = {
                from: account,
                gas: web3.utils.toHex(estimarGas + 200000),
                gasPrice: web3.utils.toHex(web3.utils.toWei('1', 'gwei'))
            }

            deployVotos.send(parametros, function(error, transactionHash){
                console.log('-------- TX --------')
                console.log(transactionHash)
            })
                .on('error', function(error){
                    console.log('-------- ERROR --------')
                    console.log(error)
                    $('#deployVotacion').prop('disabled', false)

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
                    console.log('-------- CONFIRMAION --------')
                    console.log(receipt.contractAddress)
                    direccionVotos = receipt.contractAddress
                })
                .then(function(newContractInstance){
                    console.log('-------- NUEVO CONTRATO --------')
                    console.log(newContractInstance.options.address)
                    votosContrato = newContractInstance
                    $('#nuevaVotacion').remove();
                    // obtenerPropuestas(votosABI);
                    suscribirsePropuestas(votosABI);
                    suscribirseVotos(votosABI);
                    $('#nuevaPropuesta').css( "display", "block" );;
                    // instance with the new contract address
                });
        })
    }

    $('#deployPropuesta').on('click', async () => {
        if (!votosContrato) return;

        const propuesta = $('#propuesta').val();

        votosContrato.methods.agregarPropuesta(propuesta).send({
            from: account
        }, (error, txHash) => {
            if (!error) {
                alert(`Propuesta agregada correctamente`)
                console.log(txHash)
            } else {
                alert('Error, ver en la consola')
                console.log(error)
            }
        })
    })


    // Eventos

})


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


const obtenerPropuestas = (votosABI) => {
    $('#propuestas li').remove(votosABI);
    votosContrato.getPastEvents("Propuestas", {
        fromBlock: 0,
        toBlock: 'latest'
    }).then(events => {
        console.log(votosABI[4])
        events.forEach(e => {
            const decoded = web3.eth.abi.decodeLog(votosABI[1]['inputs'], e.raw.data, [
                e.raw.topics[1],
                e.raw.topics[2],
                e.raw.topics[0]
            ]);
            const blockie = document.blockies.create({seed: decoded[2]})
            $('#propuestas ul').append(`
      <li data-id=${decoded[0]}>
        ${decoded[1]}
        <small> agregada por <span id='propuesta-${decoded[0]}'> <span> ${decoded[2]} </small> <br>
        <button class='btn btn-success' onclick='votar(${decoded[0]})'> Votar</button>
       </li>`)
            $(`#propuesta-${decoded[0]}`).append(blockie)
            // console.log(decoded)
        })
    })
}

const suscribirsePropuestas = (votosABI) => {
    votosContrato.events.Propuestas({
        //   filter: { _id: '' } // parametros indexados
        fromBlock: 'latest'
    }).on('connected', function() {
        console.log('**** Subscrito a propuestas ****')
    }).on('data', function(e) {
        const decoded = web3.eth.abi.decodeLog(votosABI[1]['inputs'], e.raw.data, [
            e.raw.topics[1],
            e.raw.topics[2],
            e.raw.topics[0]
        ]);

        const blockie = document.blockies.create({seed: decoded[2]})

        $('#propuestas ul').append(`
      <li data-id=${decoded[0]}>
        ${decoded[1]}
        <small> agregada por <span id='propuesta-${decoded[0]}'> <span> ${decoded[2]} </small> <br>
        <button class='btn btn-success' onclick='votar(${decoded[0]})'> Votar</button>
       </li>`)
        $(`#propuesta-${decoded[0]}`).append(blockie)
    })
}

const suscribirseVotos = (votosABI) => {
    $('#votos li').remove();

    votosContrato.events.Voto({
        //   filter: { _id: '' } // parametros indexados
        fromBlock: 0
    }).on('connected', function() {
        console.log('**** Suscrito a votos ****')
    }).on('data', function(e) {
        const decoded = web3.eth.abi.decodeLog(votosABI[2]['inputs'], e.raw.data, [
            e.raw.topics[1],
            e.raw.topics[2],
            e.raw.topics[0]
        ]);


        $('#votos ul').append(`
      <li><span id='voto-${decoded[0]}'> <span> ${decoded[0]} ha votado la propuesta
        (${decoded[1]}) ${decoded[2]}
       </li>`)

    })
}

const votar = (propuestaId) => {
    if (account) {
        votosContrato.methods.votar(propuestaId).send({
            from: account
        }, (error, txHash) => {
            if (!error) {
                alert(`Voto enviado`)
                console.log(txHash)
            } else {
                alert('Error, ver en la consola')
                console.log(error)
            }
        })
    }
}
