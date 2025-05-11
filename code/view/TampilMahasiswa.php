<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelp($i) . "</td>
			<td>
				<a href='index.php?aksi=edit&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-warning btn-sm'>Edit</a>
				<a href='index.php?aksi=delete&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
			</td>
			</tr>";
		}
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		
		// Set default form for adding new data
		$this->tpl->replace("DATA_FORM_TITLE", "TAMBAH DATA MAHASISWA");
		$this->tpl->replace("DATA_FORM_ACTION", "index.php?aksi=create");
		$this->tpl->replace("DATA_ID", "");
		$this->tpl->replace("DATA_NIM", "");
		$this->tpl->replace("DATA_NAMA", "");
		$this->tpl->replace("DATA_TEMPAT", "");
		$this->tpl->replace("DATA_TL", "");
		$this->tpl->replace("DATA_GENDER_L", "checked");
		$this->tpl->replace("DATA_GENDER_P", "");
		$this->tpl->replace("DATA_EMAIL", "");
		$this->tpl->replace("DATA_TELP", "");
		$this->tpl->replace("DATA_BUTTON", "Tambah");

		// Menampilkan ke layar
		$this->tpl->write();
	}
	
	function tampilForm($id = null)
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		// Generate table data
		for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesmahasiswa->getNim($i) . "</td>
			<td>" . $this->prosesmahasiswa->getNama($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTl($i) . "</td>
			<td>" . $this->prosesmahasiswa->getGender($i) . "</td>
			<td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
			<td>" . $this->prosesmahasiswa->getTelp($i) . "</td>
			<td>
				<a href='index.php?aksi=edit&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-warning btn-sm'>Edit</a>
				<a href='index.php?aksi=delete&id=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
			</td>
			</tr>";
		}
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");
		
		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		
		// If id is provided, get the mahasiswa data for editing
		if ($id !== null) {
			$mahasiswa = $this->prosesmahasiswa->getMahasiswaById($id);
			
			// Set form for editing existing data
			$this->tpl->replace("DATA_FORM_TITLE", "EDIT DATA MAHASISWA");
			$this->tpl->replace("DATA_FORM_ACTION", "index.php?aksi=update");
			$this->tpl->replace("DATA_ID", "<input type='hidden' name='id' value='" . $mahasiswa['id'] . "'>");
			$this->tpl->replace("DATA_NIM", $mahasiswa['nim']);
			$this->tpl->replace("DATA_NAMA", $mahasiswa['nama']);
			$this->tpl->replace("DATA_TEMPAT", $mahasiswa['tempat']);
			$this->tpl->replace("DATA_TL", $mahasiswa['tl']);
			
			// Set radio button based on gender
			if ($mahasiswa['gender'] == 'Laki-laki') {
				$this->tpl->replace("DATA_GENDER_L", "checked");
				$this->tpl->replace("DATA_GENDER_P", "");
			} else {
				$this->tpl->replace("DATA_GENDER_L", "");
				$this->tpl->replace("DATA_GENDER_P", "checked");
			}
			
			$this->tpl->replace("DATA_EMAIL", $mahasiswa['email']);
			$this->tpl->replace("DATA_TELP", $mahasiswa['telp']);
			$this->tpl->replace("DATA_BUTTON", "Update");
		} else {
			// Set default form for adding new data
			$this->tpl->replace("DATA_FORM_TITLE", "TAMBAH DATA MAHASISWA");
			$this->tpl->replace("DATA_FORM_ACTION", "index.php?aksi=create");
			$this->tpl->replace("DATA_ID", "");
			$this->tpl->replace("DATA_NIM", "");
			$this->tpl->replace("DATA_NAMA", "");
			$this->tpl->replace("DATA_TEMPAT", "");
			$this->tpl->replace("DATA_TL", "");
			$this->tpl->replace("DATA_GENDER_L", "checked");
			$this->tpl->replace("DATA_GENDER_P", "");
			$this->tpl->replace("DATA_EMAIL", "");
			$this->tpl->replace("DATA_TELP", "");
			$this->tpl->replace("DATA_BUTTON", "Tambah");
		}
		
		// Menampilkan ke layar
		$this->tpl->write();
	}
}