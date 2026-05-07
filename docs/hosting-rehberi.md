# Hosting Rehberi

Bu proje PHP kullandigi icin duz HTML hostlarindan ziyade PHP destekleyen ucretsiz bir servis secilmelidir.

## Onerilen servisler

- InfinityFree
- ProFreeHost
- 000webhost

## Yukleme adimlari

1. Bir hosting hesabi ac.
2. PHP destekli bir site olustur.
3. Bu proje klasorundeki tum dosyalari zip yap veya dogrudan `htdocs` / `public_html` altina yukle.
4. Ana sayfanin `index.html` oldugunu kontrol et.
5. `login.php` ve `contact-handler.php` dosyalarinin yuklendigi yerde oldugunu dogrula.
6. Canli sitede su senaryolari test et:
   - Ana sayfa aciliyor mu
   - Slider calisiyor mu
   - API sonuclari geliyor mu
   - Native JS dogrulamasi calisiyor mu
   - Vue dogrulamasi calisiyor mu
   - Form PHP sonuc sayfasina gidiyor mu
   - Login basarili ve basarisiz senaryolari dogru mu

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
