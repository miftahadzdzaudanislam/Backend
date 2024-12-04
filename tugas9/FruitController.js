var fruits = require("./fruits.js");

const index = () => {
    for (var fruit of fruits) {
        console.log(fruit);
    }
}

const store = (name) => {
    fruits.push(name);
    index();
}

const update = (position, name) => {
    fruits.splice(position, 1, name);
    index();
}

const destroy = (position) => {
    fruits.splice(position, 1);
    index();
}

module.exports = {index, store, update, destroy};