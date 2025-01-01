// import mysql
const mysql = require("mysql");

// Import dotenv dan jalankan method config
require("dotenv").config();

/**
 * Membuat koneksi database menggunakan method createConnection.
 * Method menerima parameter object: host, user, password, database
 */
// Destructing object process.env
const {
    DB_HOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_DATABASE
} = process.env;

/**
 * Menghubungkan ke database menggunakan methode connect.
 * Menerima parameter callback
 */
// update konfigurasi databse dari file .env
const db = mysql.createConnection({
    host: DB_HOST,
    user: DB_USERNAME,
    password: DB_PASSWORD,
    database: DB_DATABASE
});

module.exports = db;