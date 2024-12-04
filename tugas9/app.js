const {index, store, update, destroy} = require("./Controller/FruitController");

const main = () => {
    console.log("Metod index - Menampilkan Buah")
    index();
    console.log()
    console.log("Metod store - Menambah buah Pisang")
    store("Pisang");
    console.log()
    console.log("Metod update - Update data 0 menjadi kelapa");
    update(0, "Kelapa");
    console.log()
    console.log("Metod destroy - Menghapus data 0");
    destroy(0);
};

main();