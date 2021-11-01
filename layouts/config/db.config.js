'use strict';
const mysql = require('mysql');
//local mysql db connection
const dbConn = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '',
    database : 'bangalore'
});

module.exports = dbConn;