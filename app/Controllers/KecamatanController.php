<?php

namespace App\Controllers;

use App\Models\KecamatanModel;

class KecamatanController extends BaseController
{
    protected $kecamatanModel;
    
    public function __construct()
    {
        $this->kecamatanModel = new KecamatanModel();
    }
    
    public function index()
    {
        // Pagination: 10 data per halaman
        $currentPage = $this->request->getVar('page_kecamatan') ?? 1;
        $data['kecamatan'] = $this->kecamatanModel->paginate(10, 'kecamatan');
        $data['pager'] = $this->kecamatanModel->pager;
        $data['currentPage'] = $currentPage;
        
        return view('pages/dashboard/kecamatan/index', $data);
    }
    
    public function create()
    {
        return $this->response->setJSON(['success' => true]);
    }
    
    public function store()
    {
        $rules = [
            'kode_kecamatan' => 'required|is_unique[kecamatan.kode_kecamatan]',
            'nama_kecamatan' => 'required',
            'kode_kabupaten' => 'required',
            'nama_kabupaten' => 'required',
            'kode_provinsi' => 'required',
            'nama_provinsi' => 'required',
            'status' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }
        
        $this->kecamatanModel->save([
            'kode_kecamatan' => $this->request->getPost('kode_kecamatan'),
            'nama_kecamatan' => $this->request->getPost('nama_kecamatan'),
            'kode_kabupaten' => $this->request->getPost('kode_kabupaten'),
            'nama_kabupaten' => $this->request->getPost('nama_kabupaten'),
            'kode_provinsi' => $this->request->getPost('kode_provinsi'),
            'nama_provinsi' => $this->request->getPost('nama_provinsi'),
            'status' => $this->request->getPost('status')
        ]);
        
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Kecamatan berhasil ditambahkan'
        ]);
    }
    
    public function edit($id)
    {
        $data = $this->kecamatanModel->find($id);
        return $this->response->setJSON($data);
    }
    
    public function update($id)
    {
        $rules = [
            'kode_kecamatan' => "required|is_unique[kecamatan.kode_kecamatan,id,{$id}]",
            'nama_kecamatan' => 'required',
            'kode_kabupaten' => 'required',
            'nama_kabupaten' => 'required',
            'kode_provinsi' => 'required',
            'nama_provinsi' => 'required',
            'status' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }
        
        $this->kecamatanModel->update($id, [
            'kode_kecamatan' => $this->request->getPost('kode_kecamatan'),
            'nama_kecamatan' => $this->request->getPost('nama_kecamatan'),
            'kode_kabupaten' => $this->request->getPost('kode_kabupaten'),
            'nama_kabupaten' => $this->request->getPost('nama_kabupaten'),
            'kode_provinsi' => $this->request->getPost('kode_provinsi'),
            'nama_provinsi' => $this->request->getPost('nama_provinsi'),
            'status' => $this->request->getPost('status')
        ]);
        
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Kecamatan berhasil diupdate'
        ]);
    }
    
    public function delete($id)
    {
        $this->kecamatanModel->delete($id);
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Kecamatan berhasil dihapus'
        ]);
    }
}