// Impost database
const db = require("../config/database");

// Membuat class Model Student
class Student {
    // Membuat method static all.
    static async all() {
        return new Promise((resolve, reject) => {
            // Query MySQL untuk melihat data
            const query = "SELECT * FROM students";
    
            // mengeksekusi query
            db.query(query, (err, results) => {
                resolve(results);
            });
        });
    }

    // Membuat method static create
    static async create(data) {
        const id = await new Promise((resolve, reject) => {
            // Query MySQL untuk menambah data
            const query = "INSERT INTO students SET ?";

            // mengeksekusi query
            db.query(query, data ,(err, results) => {
                resolve(results.insertId);
            });
        });

        // Mencari data yang diupdate 
        const student = this.find(id);
        return student;
    }

    // Membuat method static find
    static async find(id) {
        return new Promise((resolve, reject) => {
            // Query MySQL untuk mencari id
            const query = "SELECT * FROM students WHERE id = ?";
            db.query(query, id, (err, results) => {
                const [student] = results;
                resolve(student);
            });
        });
    }

    // Membuat method static update
    static async update(id, data) {
        await new Promise((resolve, reject) => {
            // Query MySQL untuk mengubah data student berdasarkan id
            const query = "UPDATE students SET ? WHERE id = ?";

            // mengeksekusi query
            db.query(query, [data, id] ,(err, results) => {
                resolve(results.insertId);
            });
        });

        // Mencari data yang diupdate
        const student = await this.find(id);
        return student;
    }

    // Membuat method static delete
    static async delete(id) {
        return new Promise((resolve, reject) => {
            // Query MySQL untuk mencari id
            const query = "DELETE FROM students WHERE id = ?";
            db.query(query, id, (err, results) => {
                resolve(results);
            });
        });
    }

}

// Eksport class Student
module.exports = Student;