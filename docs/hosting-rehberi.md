# Hosting Rehberi

Bu proje PHP kullandigi icin duz HTML hostlarindan ziyade PHP destekleyen ucretsiz bir servis secilmelidir.

## Onerilen servisler

- InfinityFree
- ProFreeHost
- 000webhost

## Hizli ozet

- `InfinityFree` ve `ProFreeHost` tarafinda hedef klasor genelde `htdocs` olur.
- `000webhost` tarafinda hedef klasor genelde `public_html` olur.
- Sunucuya proje klasorunun kendisini degil, klasorun icindeki dosyalari yuklemek gerekir.
- Bu proje icin veritabani gerekmiyor; sadece `HTML`, `CSS`, `JavaScript`, `assets` ve `PHP` dosyalari yeterli.

## Yukleme adimlari

1. Bir hosting hesabi ac.
2. PHP destekli bir site veya alt alan adi olustur.
3. Hosting panelindeki `File Manager` veya `FTP` bilgilerini ac.
4. Dogru web kok klasorune gir:
   - `InfinityFree` / `ProFreeHost`: `htdocs`
   - `000webhost`: `public_html`
5. Proje klasorunun icindeki ana dosyalari yukle:
   - `index.html`
   - `cv.html`, `city.html`, `heritage.html`, `interests.html`, `contact.html`
   - `login.php`, `login-handler.php`, `welcome.php`, `contact-handler.php`
   - `assets`, `css`, `js` klasorleri
6. Eger zip ile yuklersen, zip'i web kok klasorunde ac ve dosyalarin ekstra bir alt klasor icine dusmedigini kontrol et.
7. Ana sayfanin `index.html` oldugunu kontrol et.
8. `login.php` ve `contact-handler.php` dosyalarinin ayni web kok dizininde oldugunu dogrula.
9. Canli sitede su senaryolari test et:
   - Ana sayfa aciliyor mu
   - Slider calisiyor mu
   - API sonuclari geliyor mu
   - Native JS dogrulamasi calisiyor mu
   - Vue dogrulamasi calisiyor mu
   - Form PHP sonuc sayfasina gidiyor mu
   - Login basarili ve basarisiz senaryolari dogru mu

## SIk yapilan hata

- Projeyi `webproje` adli ikinci bir klasorun icine yuklemek
- Sadece `index.html` dosyasini yukleyip `assets`, `css` veya `js` klasorlerini unutmak
- `login.php` dosyasini `index.html` ile ayni seviyeye koymamak
- Dosyalari `localhost` gibi dusunup yanlis yol kullanmak

Eger `login.php` tiklandiginda indirme olursa, bu genelde PHP yorumlayicisi olmayan bir ortamda acildigi anlamina gelir. Hostingde bu olmamali; oluyorsa dosyalarin yuklendigi servis PHP desteklemiyor olabilir.

## Canli kontrol listesi

Tarayicida su adresleri tek tek dene:

- `https://senin-alan-adin/`
- `https://senin-alan-adin/login.php`
- `https://senin-alan-adin/contact.html`

Ozellikle su akislari kontrol et:

- Yanlis login hata veriyor mu
- Dogru login `Hosgeldiniz` sayfasina gidiyor mu
- Iletisim formu iki farkli butonla ayri ayri denetleniyor mu
- Form gonderildiginde PHP sonuc sayfasi aciliyor mu

## XAMPP ile yerel test

Eger bilgisayarina XAMPP kurarsan:

1. XAMPP kur.
2. Proje klasorunu `C:\xampp\htdocs\webproje` altina kopyala.
3. Apache'yi baslat.
4. Tarayicida:

```text
http://localhost/webproje
```

adresini ac.

## Laragon alternatifi

1. Laragon kur.
2. Proje klasorunu `C:\laragon\www\webproje` altina tas.
3. Laragon'u baslat.
4. Tarayicida:

```text
http://webproje.test
```

adresini dene.

## Yukleme sonrasi yapman gerekenler

- GitHub linkini rapora ekle
- Canli site linkini rapora ekle
- Her sayfanin ekran goruntusunu al
- Sunumdan once login ve form akislarini tekrar test et
