# Mezun Bilgi Sistemi

Bu proje, PHP ve MySQL kullanarak oluşturulmuş bir Mezun Bilgi Sistemidir. Bu sistem, mezunların bilgilerini saklamak, güncellemek ve görüntülemek amacıyla geliştirilmiştir.

## İçindekiler

- [Kurulum](#kurulum)
- [Kullanım](#kullanım)
- [Dosya Açıklamaları](#dosya-açıklamaları)
- [Katkıda Bulunma](#katkıda-bulunma)


## Kurulum



1, Veritabanınızı yapılandırın ve `database.php` dosyasını uygun veritabanı bilgileriyle güncelleyin.

2. Veritabanı tablolarınızı oluşturmak için `database.sql` dosyasını kullanın:
    ```bash
    mysql -u kullanıcı_adı -p veritabanı_adı < database.sql
    ```

## Kullanım

Mezun Bilgi Sistemini çalıştırmak için aşağıdaki adımları izleyin:

1. Sunucunuzu başlatın:
    ```bash
    php -S localhost:8000
    ```

2. Tarayıcınızda `http://localhost:8000` adresine gidin ve sisteme giriş yapın.

## Dosya Açıklamaları

- **`digerraporlar.php`**: Diğer raporların yönetimi ve görüntülenmesi için kullanılır.
- **`ogrenciDetay.php`**: Öğrenci detaylarının görüntülenmesini sağlar.
- **`projeindex.php`**: Mezun Bilgi Sisteminin ana sayfasıdır.
- **`projeKayitEkle.php`**: Yeni mezun kayıtları eklemek için kullanılır.
- **`projeLogin.php`**: Kullanıcı giriş işlemleri için kullanılır.
- **`projeSil.php`**: Mezun kayıtlarının silinmesi işlemlerini gerçekleştirir.
- **`rapor.php`**: Raporların görüntülenmesi ve yönetilmesi için kullanılır.
- **`raporAlmaSayfasi.php`**: Rapor alma işlemlerini gerçekleştiren sayfadır.
- **`update.php`**: Mevcut mezun kayıtlarının güncellenmesini sağlar.
- **`update_save.php`**: Güncellenen bilgileri veri tabanına kaydeder.

## Katkıda Bulunma

Katkıda bulunmak isterseniz, lütfen önce bir konu açarak ne yapmak istediğinizi anlatın. Büyük değişiklikler için, lütfen önce neyi değiştirmek istediğinizi tartışmak için bir konu açınız.

1. Fork yapın
2. Yeni bir dal (branch) oluşturun (`git checkout -b ozellik/AmazingFeature`)
3. Değişikliklerinizi commit edin (`git commit -m 'Yeni özellik ekle'`)
4. Branch'e push edin (`git push origin ozellik/AmazingFeature`)
5. Bir Pull Request açın


