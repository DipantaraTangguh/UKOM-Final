<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $supplierModel;
    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Data Supplier',
            'data' => $this->supplierModel->findAll(),
        ];

        return view('supplier/index', $data);
    }

    public function detail($id_supplier = null)
    {
        $data = [
            'title' => 'Detail Supplier',
            'supplier' => $this->supplierModel->where(['id_supplier' => $id_supplier])->first(),
        ];

        return view('supplier/detail', $data);
    }

    public function tambah()
    {
        $newid = $this->supplierModel->getNewid();
        foreach ($newid as $id);
        $data = [
            'title' => 'Tambah Data Supplier',
            'newid' => $id,
        ];

        return view('supplier/tambah', $data);
    }

    public function save()
    {
        // ambil foto
        $foto = $this->request->getFile('foto');
        // pindahkan file foto
        $foto->move('img');
        $namaFoto = $foto->getName();

        $data = [
            'id_supplier' => $this->request->getVar('id_supplier'),
            'nama_supplier' => $this->request->getVar('nama_supplier'),
            'alamat_supplier' => $this->request->getVar('alamat_supplier'),
            'telp_supplier' => $this->request->getVar('telp_supplier'),
            'foto' => $namaFoto,
        ];

        $save = $this->supplierModel->save($data);
        return redirect()->to('/supplier')->with('msg', 'Data Berhasil Ditambahkan.');
    }

    public function edit($id_supplier)
    {
        $data = [
            'title' => 'Edit Data Supplier',
            'old' => $this->supplierModel->where(['id_supplier' => $id_supplier])->first(),
            'id_supplier' => $id_supplier,
        ];

        return view('supplier/edit', $data);
    }

    public function update()
    {
        // ambil foto
        $foto = $this->request->getFile('foto');
        // pindahkan file foto
        $foto->move('img');
        $namaFoto = $foto->getName();
        unlink('img/' . $this->request->getVar('img_lama'));

        $data = [
            'id_supplier' => $this->request->getVar('id_supplier'),
            'nama_supplier' => $this->request->getVar('nama_supplier'),
            'alamat_supplier' => $this->request->getVar('alamat_supplier'),
            'telp_supplier' => $this->request->getVar('telp_supplier'),
            'foto' => $this->request->getVar('foto'),
        ];

        $save = $this->supplierModel->save($data);
        return redirect()->to('/supplier')->with('msg', 'Data Berhasil Diedit.');
    }

    public function hapus($id_supplier)
    {
        $supplier = $this->supplierModel->find($id_supplier);

        // hapus gambar
        unlink('img/' . $supplier['foto']);

        $hapus = $this->supplierModel->where(['id_supplier' => $id_supplier])->delete();
        return redirect()->to('/supplier')->with('msg', 'Data Berhasil Dihapus.');
    }
}
