<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class Barang extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Data Barang',
            'data' => $this->barangModel->findAll(),
        ];

        return view('barang/index', $data);
    }

    public function detail($id_barang)
    {
        $data = [
            'title' => 'Detail Barang',
            'barang' => $this->barangModel->where(['id_barang' => $id_barang])->first(),
        ];

        return view('barang/detail', $data);
    }

    public function tambah()
    {
        $newid = $this->barangModel->getNewid();
        foreach ($newid as $id);
        $data = [
            'title' => 'Tambah Data Barang',
            'newid' => $id,
        ];

        return view('barang/tambah', $data);
    }

    public function save()
    {
        // ambil gambar
        $gambar = $this->request->getFile('gambar');
        // pindahkan file gambar
        $gambar->move('img');
        $namaGambar = $gambar->getName();

        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'spesifikasi' => $this->request->getVar('spesifikasi'),
            'lokasi' => $this->request->getVar('lokasi'),
            'kondisi' => $this->request->getVar('kondisi'),
            'jumlah_barang' => $this->request->getVar('jumlah_barang'),
            'sumber_dana' => $this->request->getVar('sumber_dana'),
            'gambar' => $namaGambar,
        ];

        $save = $this->barangModel->save($data);
        return redirect()->to('/barang')->with('msg', 'Data Berhasil Ditambahkan.');
    }

    public function edit($id_barang)
    {
        $data = [
            'title' => 'Edit Data Barang',
            'old' => $this->barangModel->where(['id_barang' => $id_barang])->first(),
            'id_barang' => $id_barang,
        ];

        return view('barang/edit', $data);
    }

    public function update()
    {
        // ambil gambar
        $gambar = $this->request->getFile('gambar');
        // pindahkan file gambar
        $gambar->move('img');
        $namaGambar = $gambar->getName();

        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'spesifikasi' => $this->request->getVar('spesifikasi'),
            'lokasi' => $this->request->getVar('lokasi'),
            'kondisi' => $this->request->getVar('kondisi'),
            'jumlah_barang' => $this->request->getVar('jumlah_barang'),
            'sumber_dana' => $this->request->getVar('sumber_dana'),
            'gambar' => $this->request->getVar('gambar'),
        ];

        $save = $this->barangModel->save($data);
        return redirect()->to('/barang')->with('msg', 'Data Berhasil Diedit.');
    }

    public function hapus($id_barang)
    {
        $barang = $this->barangModel->find($id_barang);

        $hapus = $this->barangModel->where(['id_barang' => $id_barang])->delete();
        return redirect()->to('/barang')->with('msg', 'Data Berhasil Dihapus.');
    }
}
