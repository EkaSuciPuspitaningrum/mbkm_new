<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    use HasFactory;

    protected $table = 'log_books';

    protected $casts = [
        'mahasiswa_mbkm_id' => 'string'
    ];

    protected $fillable = [
        'mahasiswa_mbkm_id',
        'tanggal_log',
        'tempat',
        'uraian',
        'rencana_pencapaian',
        'approved_by_dosen',
        'approved_by_pembimbing'
    ];

    public function getTanggalLog(){
        return $this->belongsTo(LogBook::class, 'tanggal_log');
    }

    public function getTempatLog(){
        return $this->belongsTo(LogBook::class, 'tempat');
    }

    public function getUraianLog(){
        return $this->belongsTo(LogBook::class, 'uraian');
    }

    public function getRencanaLog(){
        return $this->belongsTo(LogBook::class, 'rencana_pencapaian');
    }

    public function getMahasiswaMbkm(){
        return $this->belongsTo(MahasiswaMbkm::class, 'mahasiswa_mbkm_id');
    }

    public function setApprovedByDosen(bool $approved){
        $this->approved_by_dosen($approved);
        $this->save();
    }

    public function setApprovedByPembimbing(bool $approved){
        $this->approved_by_pembimbing($approved);
        $this->save();
    }
}
