<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfilModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlProfil extends BaseController
{
    public function index()
    {
        $profil = new ProfilModel();
        $ambil = $profil->findAll();

        $data = [
            'dataprofil' => $ambil
        ];
        return view('profil/index', $data);
    }

    public function dataprofil()
    {
        $profil = new ProfilModel();
        $ambil = $profil->findAll();

        $data = [
            'dataprofil' => $ambil
        ];
        return view('profil/index', $data);
    }

    public function edit($id)
    {
        $profil = new ProfilModel();
        $ambil = $profil->find($id);

        $data = [
            'dataprofil' => $ambil
        ];
        return view('profil/edit', $data);
    }

    public function update($id)
    {
        $profil = new ProfilModel();

        // Validation rules
        $validationRules = [
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]'
        ];

        if (!$this->validate($validationRules)) {
            // Redirect back with validation errors and old input
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName(); // Generate a random name for the file
        $foto->move('upload', $namafoto); // Move the file to the 'upload' directory

        // Update the record in the database
        $profil->update($id, ['foto' => $namafoto]);

        return redirect()->to('/dataprofil')->with('success', 'Data berhasil diupdate');
    }

}
