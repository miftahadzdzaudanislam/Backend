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

        if (students.length > 0) {
            const data = {
                message: "Menampilkan data semua Students",
                data: students
            }
    
            res.status(200).json(data);
        } else {
            const data = {
                message: "Student is empty",
            };
            res.status(200).json(data);
        }

    }
    // fungsi untuk menambah data
    async store(req, res) {
        // Menambah data Student
        const {nama, nim, email, jurusan} = req.body;
        if (!nama || !nim || !email || !jurusan) {
            const data = {
                message: "Semua data harus dikirim",
            };
            res.status(422).json(data);
        } 

        const students = await Student.create(req.body);

        const data = {
            message: "Menambah data students:",
            data: students,
        };
        res.status(201).json(data);
    }
    // fungsi untuk mengubah data
    async update(req, res) {
        const {id} = req.params;

        // Mengubah cari id student yang ingin diupdate
        const student = await Student.find(id);

        if (student) {
            // Mengupdate data
            const students = await Student.update(id, req.body);
            const data = {
                message: `Mengedit students id ${id}`,
                data: students,
            };
            res.status(200).json(data);
        } else {
            const data = {
                message: "Student not found",
            };
            res.status(404).json(data);
        }
    }
    // fungsi untuk menghapus data
    async destroy(req, res) {
        const {id} = req.params;
        const student = await Student.find(id);

        if (student) {
            await Student.delete(id);
            const data = {
                message: `Menghapus students id ${id}`,
                data: student,
            };
            res.status(200).json(data);
        } else {
            const data = {
                message: "Student not found",
            };
            res.status(404).json(data);
        }
    }
    // fungsi untuk melihat data berdasrkan id
    async show(req, res) {
        const {id} = req.params;
        const student = await Student.find(id);

        if (student) {
            const data = {
                message: `Melihat data students id ${id}`,
                data: student,
            };
            res.status(200).json(data);
        } else {
            const data = {
                message: "Student not found",
            };
            res.status(404).json(data);
        }
    } 
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
