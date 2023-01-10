const { initializeApp } = require("firebase/app")
const { getDatabase, ref, onValue } = require("firebase/database")

const fireBaseConfig = {
    databaseURL: "https://fir-to-alat-default-rtdb.asia-southeast1.firebasedatabase.app/"
}

// koneksi ke database
const app = initializeApp(fireBaseConfig)
const database = getDatabase(app)

// onValue() dipanggil setiap kali data diubah pada referensi database yang ditentukan, termasuk perubahan 
// pada turunan. Untuk membatasi ukuran snapshot Anda, lampirkan hanya pada tingkat terendah yang diperlukan 
// untuk melihat perubahan.
const starCountRef = ref(database, 'Glukosa(Mgdl)')
onValue(starCountRef, snapshot => {
    const data = snapshot.val()

    document.getElementById('realtime-glukosa').value = `${Math.ceil(data)} mg/dl`
})