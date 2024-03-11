//Configurações gerais da aplicação com Live-Server
//Esta lib permite a utilização de HTTPS, oque pode ser útil no futuro

import liveServer from 'live-server';
import chokidar from 'chokidar';

//parametros de configuração da aplicação
const params = {
    port: 3000,
    host: '0.0.0.0',
    root: './',
    open: true,
    ignore: 'scss,my/templates',
    file: 'index.html',
    logLevel: 2
};

/**
 * Executa a aplicação inicialmente
 * e obeserva qualquer alteração no código para restartar o app 
 */
const startServer = () => {
    liveServer.start(params);
    chokidar
        .watch('.', {
            ignored: '/node_modules|\.git/',
            persistent: true})
        .on('change', () => {
            liveServer.shutdown();
            startServer();
        });
};

startServer();