const produk = [
  { id: 1, nama: 'Spotify Premium', harga: 50000  },
  { id: 2, nama: 'Netflix', harga: 80000  },
  { id: 3, nama: 'Capcut Pro', harga: 30000  },
  { id: 4, nama: 'Canva Pro', harga: 40000 },
  { id: 5, nama: 'ChatGPT Plus', harga: 250000 }
];


let keranjang = [];

const produkList = document.getElementById('produk-list');
const cartDiv = document.getElementById('cart');
const totalEl = document.getElementById('total');

// Tampilkan produk
produk.forEach(item => {
  const card = document.createElement('div');
  card.className = 'card';
  card.innerHTML = `
   
    <h3>${item.nama}</h3>
    <p>Rp ${item.harga}</p>
    <button onclick="tambahKeKeranjang(${item.id})">Tambah</button>
  `;
  produkList.appendChild(card);
});

// Fungsi tambah ke keranjang
function tambahKeKeranjang(id) {
  const item = produk.find(p => p.id === id);
  keranjang.push(item);
  updateKeranjang();
}

// Tampilkan isi keranjang
function updateKeranjang() {
  cartDiv.innerHTML = '';
  let total = 0;

  keranjang.forEach((item, index) => {
    total += item.harga;
    const el = document.createElement('div');
    el.innerHTML = `
      ${item.nama} - Rp ${item.harga}
      <button onclick="hapusDariKeranjang(${index})">Hapus</button>
    `;
    cartDiv.appendChild(el);
  });

  totalEl.textContent = `Total: Rp ${total}`;
}

// Hapus item dari keranjang
function hapusDariKeranjang(index) {
  keranjang.splice(index, 1);
  updateKeranjang();
}
