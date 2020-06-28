var gambar_utama = '';
var gambar_pengantin_wanita = '';
var gambar_pengantin_pria = '';

function getGambarUtama(event){
    gambar_utama = event.target.files[0]
}

function getGambarWanita(event){
    gambar_pengantin_wanita = event.target.files[0]
}

function getGambarPria(event){
    gambar_pengantin_pria = event.target.files[0]
}

function save(){

    let nama_pengantin_wanita = document.getElementById('nama_pengantin_wanita').value
    let nama_pengantin_pria = document.getElementById('nama_pengantin_pria').value
    let tanggal_pernikahan = document.getElementById('tanggal_pernikahan').value
    let alamat_resepsi = document.getElementById('alamat_resepsi').value

    let formData = new FormData;
    formData.append('gambar_utama', gambar_utama)
    formData.append('gambar_pengantin_wanita', gambar_pengantin_wanita)
    formData.append('gambar_pengantin_pria', gambar_pengantin_pria)
    formData.append('nama_pengantin_wanita', nama_pengantin_wanita)
    formData.append('nama_pengantin_pria', nama_pengantin_pria)
    formData.append('tanggal_pernikahan', tanggal_pernikahan)
    formData.append('alamat_resepsi', alamat_resepsi)

    axios({
        method: 'post',
        url: 'http://localhost:8080/api/create.php',
        data: formData,
        // headers: {'Content-Type': 'multipart/form-data' }
        })
        .then(function (response) {
            //handle success
            alert('link undangan pernikahan anda adalah ' + response.data.link)
        })
        .catch(function (response) {
            //handle error
            console.log(response);
        });
}