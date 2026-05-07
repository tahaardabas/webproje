# Web Teknolojileri Projesi

Bu proje, Sakarya Universitesi `Web Teknolojileri` dersi icin Taha Arda Bas adina hazirlanmis cok sayfali bir kisisel web uygulamasidir.

## Sayfalar

- `index.html`: Hakkinda sayfasi
- `cv.html`: Semantik HTML5 ile hazirlanmis ozgecmis sayfasi
- `city.html`: Ordu tanitim sayfasi ve tiklanabilir slider
- `heritage.html`: Kurul Kalesi ve Kibele odakli miras sayfasi
- `interests.html`: TVMaze API entegrasyonlu ilgi alanlari sayfasi
- `contact.html`: Native JavaScript ve Vue ile ayri ayri dogrulanan iletisim formu
- `contact-handler.php`: Form verilerini PHP ile duzenli gosterim
- `login.php`: Giris formu
- `login-handler.php`: PHP ile login kontrolu
- `welcome.php`: Basarili giris sayfasi

## Teknik yapi

- Tasarim: `Bootstrap 5.3.3`
- Ozel stiller: `css/style.css`
- Genel davranislar: `js/common.js`
- API entegrasyonu: `js/interests.js`
- Form denetimi: `js/contact.js`
- Framework: `Vue 3` CDN surumu
- Sunucu tarafi: `PHP`

## Login bilgisi

Odev formatina uygun ana giris:

- Kullanici adi: `b241210066@sakarya.edu.tr`
- Sifre: `B241210066`

Not:
Sunucu tarafi kolay test icin `b241210066@ogr.sakarya.edu.tr` ve `taha.bas@ogr.sakarya.edu.tr` adreslerini de kabul edecek sekilde hazirlanmistir; ancak odevde gosterilecek temel kimlik bilgisi ustteki formattir.

## Doldurulmayi bekleyen alanlar

Kullanicinin bilerek bos biraktigi ve sonradan doldurulacak alanlar icin yer tutucular eklenmistir:

- Hakkinda metni
- Etkinlikler
- Sosyal medya baglantilari
- Gercek profil fotografi
- Kisisel video
- Egitim detaylari
- Teknoloji listesi
- Sertifika ve proje detaylari
- Telefon ve diger gercek iletisim ayrintilari

Detayli liste icin `docs/kullanici-doldurulacaklar.md` dosyasina bak.

## Yerel calistirma

Bu klasorde dogrudan acilan HTML sayfalari calisir; fakat `PHP` sayfalari icin bir yerel sunucu gerekir.

Ornek `XAMPP` komutu:

```powershell
C:\xampp\php\php.exe -S localhost:8000
```

Komutu proje klasorunde calistirdiktan sonra su adrese git:

```text
http://localhost:8000
```

## Teslim icin gerekli ek dosyalar

- `docs/rapor-sablonu.md`
- `docs/hosting-rehberi.md`
- `docs/push-plani.md`
- `docs/sources.md`

## Onemli not

Bu bilgisayarda proje hazirlanirken `php` ve `git` komutlari PATH uzerinde gorunmedigi icin calistirma ve push islemleri test edilememistir. Kodlar hostinge uygun bicimde hazirlanmistir; kurulum asamalari dokumanlarda anlatilmistir.
