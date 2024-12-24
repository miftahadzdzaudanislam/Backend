// Import data students
const students = require("../data/students.js");
// Imposrt Model Student
const Student = require("../models/Student.js");

// Membuat class StudentController
class StudentController {
    // fungsi untuk melihat data student
    async index(req, res) {
        // Memanggil method static all dengan async await.
        const students = await Student.all();

        const data = {
            message: "Menampilkan data semua Students",
            data: students
        }

        res.json(data);
    }
    // fungsi untuk menambah data
    async store(req, res) {
        const {nama, nim, email, jurusan} = req.body;

        // Menambah data Student
        const students = await Student.create(nama, nim, email, jurusan);
        
        const data = {
            message: `Menambah data students:`,
            data: students,
        };
        res.json(data);
    }
    update(req, res) {
        const {id} = req.params;
        const {name} = req.body;

        // Mengubah data Student
        students.splice(id, 1, name);

        const data = {
            message: `Mengedit students id ${id}, nama ${name}`,
            data: students,
        };
        res.json(data);
    }
    destroy(req, res) {
        const {id} = req.params;

        // Menghapus data Student
        students.splice(id, 1)

        const data = {
            message: `Menghapus students id ${id}`,
            data: students,
        };
        res.json(data);
    }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
