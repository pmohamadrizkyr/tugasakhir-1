let listKaryawan = document.getElementsByTagName("ul");
listKaryawan[0].addEventListener("click", tampilkan);
function tampilkan(event){
    alert("Cek data karyawan " + event.target.innerHTML);
}
//ketika apa yang dipilih sama user, akan muncul