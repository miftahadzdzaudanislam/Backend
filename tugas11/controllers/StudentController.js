// TODO 3: Import data students dari folder data/students.js
const students = require("../data/students.js")

// Membuat class StudentController
class StudentController {
    index(req, res) {
        // TODO 4: Tampilkan data students
        const data = {
            message: "Menampilkan semua students",
            data: students,
        };
        res.json(data);
    }
    store(req, res) {
        // TODO 5: Tambahkan data students
        const {name} = req.body;

        // Menambah data Student
        students.push(name);
        
        const data = {
            message: `Menambah data students: ${name}`,
            data: students,
        };
        res.json(data);
    }
    update(req, res) {
        // TODO 6: Update data students
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
        // TODO 7: Hapus data students
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
