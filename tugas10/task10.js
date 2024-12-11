const showDownload = (result) => {
    console.log("Download Selesai.");
    console.log(`Hasil download: ${result}`);
}

// Promise
const download = () => {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve("windows-10.exe");
        }, 3000);
    });
}

// Async Await
async function main() {
    const result = await download();
    showDownload(result);
}

main();