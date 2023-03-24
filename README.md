# nwp_lv2
1. Zadatak
Spojili smo se na bazu 'radovi' koju sam prethodno napravila u phpmyadmin. Stvoren je direktorij pod nazivom radovi kao i baza. Zatim se provodio backup baze, podaci koji će se spremiti u txt datoteku i odredila kako se će ispisati u txt datoteku. Dodala sam još ispis da je određena tablica, pa da npr ako izaberem bazu gdje nema tablice da upozorimo korisnika

2. Zadatak
Config.php imamo spajanje s serverom. U index imamo upload file/slike, slika i file mi je uploada svaki put na bazu, no u mapi upload mi se prikazuje(samo jednom, dok se u bazi prikazuje svaki upload bez obzira što je ista datoteka uploadana) sve što sam ikad uploadana na bazu imagefile koju sam posebno napravila. Nažalost nisam uspjela napraviti kriptiranje datoteke

3. Zadatak
Napočetku kod zadatka sam imala problem koji je nalazio u samoj xml datoteci. Problem je bio u slici koja je sadržavala u svojem linku & koji po pravilu ne bi smio biti jer parser pravi problem oko tih posebnih znakova. Pa sam tako morala napraviti prisilnu zamjenu znakova. Nakon parsiranja sam samo izdvojila potrebne informacije koje su se tražile(slika, ime,prezime, email i zivotopis)
