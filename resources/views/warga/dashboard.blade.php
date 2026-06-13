@extends('layouts.warga')
@section('title', 'Dashboard')

@section('content')
{{-- Welcome Banner --}}
<div style="position: relative; overflow: hidden; background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); border-radius: 16px; padding: 28px; margin-bottom: 32px; color: #ffffff; box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.25);">
    <div style="position: absolute; right: -40px; top: -40px; width: 160px; height: 160px; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%; filter: blur(40px);"></div>
    <div style="position: absolute; right: 80px; bottom: 0; width: 128px; height: 128px; background-color: rgba(255, 255, 255, 0.05); border-radius: 50%; filter: blur(30px);"></div>
    <div style="position: relative; z-index: 10; display: flex; flex-direction: row; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 800; margin: 0; letter-spacing: -0.02em; line-height: 1.2;">Selamat Datang, {{ explode(' ', auth()->user()->name)[0] }}!</h1>
            <p style="color: rgba(239, 246, 255, 0.9); font-size: 13px; margin: 8px 0 0 0; max-width: 500px; line-height: 1.5;">
                Ajukan surat keterangan atau permohonan administrasi Desa Ketileng secara online, kapan saja dan di mana saja.
            </p>
        </div>
        <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 6px; flex-shrink: 0;">
            <span style="padding: 4px 12px; background-color: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 9999px; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
                Hari Ini
            </span>
            <p style="font-size: 13px; font-weight: 600; color: #f1f5f9; margin: 4px 0 0 0;">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </p>
        </div>
    </div>
</div>

{{-- Stat Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="card glass-card" style="padding: 20px; text-align: center;">
        <p style="font-size: 30px; font-weight: 800; color: #1e293b; margin: 0;">{{ $stats['total'] }}</p>
        <p style="font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin: 6px 0 0 0;">Total Pengajuan</p>
    </div>
    
    <div class="card glass-card" style="padding: 20px; text-align: center;">
        <p style="font-size: 30px; font-weight: 800; color: #10b981; margin: 0;">{{ $stats['selesai'] }}</p>
        <p style="font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin: 6px 0 0 0;">Selesai</p>
    </div>
    
    <div class="card glass-card" style="padding: 20px; text-align: center;">
        <p style="font-size: 30px; font-weight: 800; color: #2563eb; margin: 0;">{{ $stats['proses'] }}</p>
        <p style="font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin: 6px 0 0 0;">Sedang Diproses</p>
    </div>
    
    <div class="card glass-card" style="padding: 20px; text-align: center;">
        <p style="font-size: 30px; font-weight: 800; color: #ef4444; margin: 0;">{{ $stats['ditolak'] }}</p>
        <p style="font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin: 6px 0 0 0;">Ditolak</p>
    </div>
</div>

{{-- Panduan Pengajuan Surat --}}
<div class="mb-8">
    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 16px;">
        <svg style="width: 20px; height: 20px; color: #64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <h2 style="font-size: 16px; font-weight: 700; color: #1e293b; margin: 0;">Panduan Layanan Surat Online</h2>
    </div>
    
    <div class="card glass-card" style="padding: 24px;">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
            {{-- Connecting Line (visible on md screens) --}}
            <div class="hidden md:block absolute top-10 left-[12%] right-[12%] h-0.5 bg-slate-100 z-0"></div>

            {{-- Step 1 --}}
            <div class="relative z-10 flex flex-col items-center text-center group">
                <div style="width: 80px; height: 80px; background-color: #ffffff; border: 4px solid #f8fafc; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                    <div style="width: 48px; height: 48px; background-color: #eff6ff; color: #2563eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px; border: 1px solid #dbeafe;">
                        1
                    </div>
                </div>
                <h3 style="font-size: 14px; font-weight: 700; color: #1e293b; margin: 0;">Pilih Jenis Surat</h3>
                <p style="font-size: 12px; color: #64748b; margin-top: 8px; padding: 0 8px; line-height: 1.5;">Buka menu Ajukan Surat dan pilih jenis dokumen yang sesuai keperluan Anda.</p>
            </div>

            {{-- Step 2 --}}
            <div class="relative z-10 flex flex-col items-center text-center group">
                <div style="width: 80px; height: 80px; background-color: #ffffff; border: 4px solid #f8fafc; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                    <div style="width: 48px; height: 48px; background-color: #fef3c7; color: #d97706; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px; border: 1px solid #fef3c7;">
                        2
                    </div>
                </div>
                <h3 style="font-size: 14px; font-weight: 700; color: #1e293b; margin: 0;">Upload Persyaratan</h3>
                <p style="font-size: 12px; color: #64748b; margin-top: 8px; padding: 0 8px; line-height: 1.5;">Lengkapi formulir keperluan dan upload file/foto KTP serta Kartu Keluarga Anda.</p>
            </div>

            {{-- Step 3 --}}
            <div class="relative z-10 flex flex-col items-center text-center group">
                <div style="width: 80px; height: 80px; background-color: #ffffff; border: 4px solid #f8fafc; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                    <div style="width: 48px; height: 48px; background-color: #f3e8ff; color: #7c3aed; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px; border: 1px solid #f3e8ff;">
                        3
                    </div>
                </div>
                <h3 style="font-size: 14px; font-weight: 700; color: #1e293b; margin: 0;">Proses Verifikasi</h3>
                <p style="font-size: 12px; color: #64748b; margin-top: 8px; padding: 0 8px; line-height: 1.5;">Berkas diperiksa oleh Admin Desa dan disetujui Kepala Desa secara digital (TTE).</p>
            </div>

            {{-- Step 4 --}}
            <div class="relative z-10 flex flex-col items-center text-center group">
                <div style="width: 80px; height: 80px; background-color: #ffffff; border: 4px solid #f8fafc; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                    <div style="width: 48px; height: 48px; background-color: #ecfdf5; color: #10b981; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px; border: 1px solid #d1fae5;">
                        4
                    </div>
                </div>
                <h3 style="font-size: 14px; font-weight: 700; color: #1e293b; margin: 0;">Unduh Surat (PDF)</h3>
                <p style="font-size: 12px; color: #64748b; margin-top: 8px; padding: 0 8px; line-height: 1.5;">Surat yang disetujui dapat diunduh langsung ke handphone Anda dengan scan QR Code.</p>
            </div>
        </div>
    </div>
</div>
@endsection
