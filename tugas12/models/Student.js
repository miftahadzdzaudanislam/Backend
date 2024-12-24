// Impost database
const db = require("../config/database");

// Membuat class Model Student
class Student {
    // Membuat method static all.
    static all() {
        return new Promise((resolve, reject) => {
            // Query MySQL untuk melihat data
            const query = "SELECT * FROM students";
    
            // mengeksekusi query
            db.query(query, (err, results) => {
                resolve(results);
            });
        });
    }

    static create(nama, nim, email, jurusan, created_at = null, updated_at = null) {
        return new Promise((resolve, reject) => {
            // Query MySQL untuk menambah data
            const query = "INSERT INTO students (nama, nim, email, jurusan) VALUES (?, ?, ?, ?)";

            // mengeksekusi query
            db.query(query, [nama, nim, email, jurusan],(err, results) => {
                resolve({id: results.insertId, nama, nim, email, jurusan, created_at, updated_at});
            });
        });
    }

}

// Eksport class Student
module.exports = Student;