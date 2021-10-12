<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Inbox
 *
 * @property int $id_masuk
 * @property string $surat_masuk
 * @property string $file_masuk
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereFileMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereIdMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereSuratMasuk($value)
 */
	class Inbox extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Laporan
 *
 * @property int $id_report
 * @property string $jenis_gratifikasi
 * @property int $nilai_equivalent
 * @property string $tanggal_pemberian
 * @property string $lokasi_pemberian
 * @property string $hubungan_pemberi
 * @property int $id_tugas
 * @property int $id_pemberi
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan whereHubunganPemberi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan whereIdPemberi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan whereIdReport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan whereIdTugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan whereJenisGratifikasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan whereLokasiPemberian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan whereNilaiEquivalent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Laporan whereTanggalPemberian($value)
 */
	class Laporan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Outbox
 *
 * @property int $id_tugas
 * @property string $tugas
 * @property string $file_tugas
 * @property int $id
 * @property int $id_masuk
 * @property-read \App\Models\Inbox $inbox
 * @property-read \App\Models\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox query()
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereFileTugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereIdMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereIdTugas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereTugas($value)
 */
	class Outbox extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Profile
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 */
	class Profile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $jabatan
 * @property string $avatar
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $profilepicture_filename
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

