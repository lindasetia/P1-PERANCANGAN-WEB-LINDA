<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Reminder Mahasiswa | API</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
body{background:#f4f6f9;}
.container{padding:30px 40px;}
.header{display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;}
.header h1{color:#1e3a8a;}
.btn{background:#2563eb;color:#fff;padding:12px 18px;border-radius:12px;border:none;cursor:pointer;font-weight:600;}
.btn:hover{background:#1e40af;}
.card{background:#fff;border-radius:18px;padding:25px;box-shadow:0 10px 25px rgba(0,0,0,.08);margin-bottom:25px;}
.form-group{margin-bottom:15px;}
.form-group label{font-size:13px;font-weight:600;color:#1e3a8a;}
.form-group input,.form-group textarea{width:100%;padding:12px;border-radius:12px;border:1px solid #c7d2fe;margin-top:5px;}
table{width:100%;border-collapse:collapse;}
thead{background:#1e3a8a;color:#fff;}
th,td{padding:14px 16px;font-size:14px;}
tbody tr:nth-child(even){background:#f8fafc;}
tbody tr:hover{background:#e0e7ff;}
.status{padding:6px 12px;border-radius:20px;font-size:12px;font-weight:600;}
.aktif{background:#dcfce7;color:#166534;}
.selesai{background:#e0e7ff;color:#1e3a8a;}
.action{display:flex;gap:6px;}
.done{background:#10b981;color:#fff;border:none;padding:8px 12px;border-radius:10px;cursor:pointer;}
.delete{background:#ef4444;color:#fff;border:none;padding:8px 12px;border-radius:10px;cursor:pointer;}
footer{margin-top:30px;text-align:center;font-size:13px;color:#6b7280;}
</style>
</head>

<body>

<div class="container">

<div class="header">
    <h1>Reminder Mahasiswa (REST API)</h1>
</div>

<div class="card">
<h3>Tambah Reminder</h3><br>

<div class="form-group">
<label>ID Mahasiswa</label>
<input type="text" id="id_mahasiswa">
</div>

<div class="form-group">
<label>Judul</label>
<input type="text" id="judul">
</div>

<div class="form-group">
<label>Deskripsi</label>
<textarea id="deskripsi"></textarea>
</div>

<div class="form-group">
<label>Tanggal Pengingat</label>
<input type="date" id="tanggal">
</div>

<button class="btn" onclick="tambahReminder()">Simpan Reminder</button>
</div>

<div class="card">
<h3>Data Reminder</h3><br>
<table>
<thead>
<tr>
<th>No</th>
<th>ID Mahasiswa</th>
<th>Judul</th>
<th>Tanggal</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>
<tbody id="dataReminder"></tbody>
</table>
</div>

<footer>© 2025 Sistem Reminder Mahasiswa</footer>
</div>

<script>
const API_URL = "api/reminder_api.php";

function loadReminder(){
fetch(API_URL)
.then(res => res.json())
.then(res => {
let html="", no=1;

if(res.data.length===0){
html = `<tr><td colspan="6" align="center">Belum ada data</td></tr>`;
}else{
res.data.forEach(r=>{
html+=`
<tr>
<td>${no++}</td>
<td>${r.id_mahasiswa}</td>
<td>${r.judul}</td>
<td>${r.tanggal_pengingat}</td>
<td><span class="status ${r.status}">${r.status}</span></td>
<td class="action">
<button class="done" onclick="updateStatus(${r.id_reminder})">✔</button>
<button class="delete" onclick="hapusReminder(${r.id_reminder})">🗑</button>
</td>
</tr>`;
});
}
document.getElementById("dataReminder").innerHTML=html;
});
}

function tambahReminder(){
fetch(API_URL,{
method:"POST",
headers:{"Content-Type":"application/json"},
body:JSON.stringify({
id_mahasiswa:id_mahasiswa.value,
judul:judul.value,
deskripsi:deskripsi.value,
tanggal_pengingat:tanggal.value
})
}).then(()=>loadReminder());
}

function updateStatus(id){
fetch(API_URL,{
method:"PUT",
headers:{"Content-Type":"application/json"},
body:JSON.stringify({id_reminder:id,status:"selesai"})
}).then(()=>loadReminder());
}

function hapusReminder(id){
if(confirm("Hapus reminder?")){
fetch(API_URL,{
method:"DELETE",
headers:{"Content-Type":"application/json"},
body:JSON.stringify({id_reminder:id})
}).then(()=>loadReminder());
}
}

loadReminder();
</script>

</body>
</html>
