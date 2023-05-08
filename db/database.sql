create database proprak4;
use proprak4;

drop table emails;
drop table users;
drop table abonnees;
drop table pagecontent;

create table emails 
(
email varchar(255)not null,
subject varchar(255),
content TEXT(1000) not null
);

create table users
(
userId varchar(255) primary key not null,
password varchar(255) not null,
email varchar(255),
isadmin boolean
);

create table abonnees
(
    email varchar(255)
);
create table pagecontent
(
	pagename varchar(50) primary key not null,
    content text(2555) not null
);

insert into pagecontent values ('index.php' ,'<main id="home">
    <div class="top">
        <img src="media/home_banner.png" alt="phone">
    </div>
    <div class="bottom">
        <h1>iPhone 14 pro</h1>
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu condimentum felis, ac tempus urna. Mauris tincidunt condimentum arcu, sit amet rutrum ex semper quis. Nunc non erat ut ligula pulvinar cursus congue id tortor. Sed aliquam aliquam ligula, commodo porttitor leo molestie a. In lobortis congue dui, vitae luctus lorem aliquet id. Aliquam accumsan elementum felis ornare porttitor. Donec eget euismod ipsum.
            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec tincidunt scelerisque diam, sed bibendum magna consectetur vel. Sed nec vestibulum dolor, non malesuada velit. Mauris rutrum accumsan quam, vitae elementum mauris </span>
        <div id="buttons">
            <button class="default">
                <a href="info.php">Meer info</a>
            </button>
            <button class="default">
                <a href="contact.php">Contact</a>
            </button>
        </div>
    </div>
</main>');
insert into pagecontent values ('info.php' ,'<main id="info">
    <div class="top">
        <img src="media/Apple-iPhone-14-Pro-iPhone-14-Pro-Max-Dynamic-Island-demo-3up.jpg.large_2x" alt="iphone14">
    </div>
</main>

<div class="bottom">
<img src="media/iPhone-14-Mock.png" alt="first">
<div class="text-box">
    <h1>Information</h1>
    <p>De iPhone 14 is de nieuwste iPhone en heeft dus de beste kwaliteit, hij is groter dan vorige iPhone. Het heeft ook een hoge display en de iPhone 14 kan ook goed tegen een stootje en is niet binnen 1 val kapot. De iPhone 14 gaat 9 uur mee zonder dat die leeg is. De IPhone 14 heeft een mooi design en is de beste IPhone tot nu toe.  </p>
</div>
</div>
<div class="bottom-2">
<img src="media/iphone14pro2-removebg-preview.png" alt="second">
<div class="text-box-2">
    <h1>Information</h1>
    <p>De iPhone 14 heeft eigenlijk alles beter dan de alternatieve telefoons, betere kwaliteit, beter model. De iPhone 14 is ook waterproof, niet elke telefoon heeft dat. Het camera standpunt is ook verbeterd. De batterij gaat ook langer mee dan de vorige iPhones.</p>
</div>
</div>');
insert into pagecontent values ('contact.php' ,'<div class="form-container">
    <div class="form-background">
        <form method="post" action="contact_backend.php">
            <h1>Contact</h1>
            <label for="email">Email</label><br>
            <input name="email" type="text" id=email placeholder="example@gmail.com" required><br>
            <label for="onderwerp">Onderwerp</label><br>
            <input name="onderwerp" type="text" id="onderwerp" required><br>
            <label for="inhoud">Inhoud</label><br>
            <textarea name="inhoud" type="text" id="inhoud"></textarea><br>

            <input name="inschrijven" type="radio" id="radio">
            <label for="radio">Inschrijven voor nieuwsbrief</label>

            <br><br>

            <div class="submit-container">
                <input type="submit" value="Verstuur" id="submit">
            </div>
        </form>
    </div>
</div>');
insert into pagecontent values ('specs.php' ,'<main id="specs">
    <div class="specs-banner">
        <img src="media/Apple-iPhone-14-Pro-iPhone-14-Pro-Max-Dynamic-Island-demo-3up.jpg.large_2x" alt="iphone14">
        <p id="specs-word">specs</p>
    </div>
    <div class="specs">
        <div class="specs-text">
            <img src="./media/450_1000" alt="iphone14">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu condimentum felis, ac tempus urna. Mauris tincidunt condimentum arcu, sit amet rutrum ex semper quis. Nunc non erat ut ligula pulvinar cursus congue id tortor. Sed aliquam aliquam ligula, commodo porttitor leo molestie a. In lobortis congue dui, vitae luctus lorem aliquet id. Aliquam accumsan elementum felis ornare porttitor. Donec eget euismod ipsum.
                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec tincidunt Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu condimentum felis, ac tempus urna. Mauris tincidunt condimentum arcu, sit amet rutrum ex semper quis. Nunc non erat ut ligula pulvinar cursus congue id tortor. Sed aliquam aliquam ligula, commodo porttitor leo molestie a. In lobortis congue dui, vitae luctus lorem aliquet id. Aliquam accumsan elementum felis ornare porttitor. Donec eget euismod ipsum.
                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec tincidunt </p>
        </div>
    </div>
</main>');