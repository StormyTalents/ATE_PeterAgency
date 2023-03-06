@extends('app')

@section('content')

<section class="top">

    <div class="content">
        <h1>Om oss</h1>
    </div>

</section>

<section class="article">
    
    <div class="content">

        <h2>Försäkringarna.se</h2>
        <p>
            På Försäkringarna.se får du hjälp att hitta rätt i försäkringsdjungeln. Vi som driver Försäkringarna.se har gedigen kunskap om försäkringar och har tidigare drivit ett flertal jämförelsetjänster för bland annat djurförsäkringar och olycksfallsförsäkringar. Sedan 2019 har vi valt att samla all försäkringsinformation på en och samma sajt.
        </p>

        <h2>Teamet</h2>

		<p style="padding-left: 100px; position: relative; padding-bottom: 15px;" itemscope itemtype="http://schema.org/Person">
			<img src="/assets/img/160x160/jakob-thorselius.jpg" alt="Jakob Thorselius" width="80" style="position: absolute; left: 0; top: 5px; border-radius: 80px;">
			<strong itemprop="name" class="text-danger">Jakob Thorselius</strong><small> - Marknadsansvarig</small>
			<small style="font-weight: 500; color: #999; display: block; padding-bottom: 3px; margin-bottom: 3px;" itemprop="email"><i class="fas fa-envelope"></i> jakob@veloxia.se</small>
			<span itemprop="description">Har tidigare arbetat på ideella föreningar såsom Mattecentrum som hjälper barn
			och unga med matematik. Grundläggande kunskaper om matematik är enligt Jakob en stor faktor
            för att förstå sig på, och fatta goda beslut inom ekonomi och då också försäkringar.<br>

            <div style="margin-top: -30px; font-size: 0.8em; padding: 10px 20px 10px 20px; margin-left: 100px; box-shadow: 0 4px 14px -4px rgba(0,0,0,0.1);">
                
                <div style="display: inline-block; width: 180px; margin: 10px 10px 10px 0px;">
                    <img src="/assets/img/360x360/valle.jpg" alt="Valle" width="180" style="margin-top: 0; margin-bottom: 5px;">
                    <br>
                    Jakobs hund Valle, född 2013. Försäkrad hos <a href="/hundforsakring/moderna-forsakringar">Moderna Försäkringar</a>.
                </div>
            </div>
            </span>
		</p>

		<p style="padding-left: 100px; position: relative; padding-bottom: 15px;" itemscope itemtype="http://schema.org/Person">
			<img src="/assets/img/160x160/viktor-svensson.jpg" alt="Viktor Svensson" width="80" style="position: absolute; left: 0; top: 5px; border-radius: 80px;">
			<strong itemprop="name" class="text-danger">Viktor Svensson</strong><small> - Utvecklingsansvarig</small>
			<small style="font-weight: 500; color: #999; display: block; padding-bottom: 3px; margin-bottom: 3px;" itemprop="email"><i class="fas fa-envelope"></i> viktor@veloxia.se</small>
            <span itemprop="description">Viktor har flera års erfarenhet av automatiserad datainsamling. Han har tidigare arbetat på en av de större bostadssajterna i Sverige och studerar även juridik vid Lunds universitet. Viktor brinner för att göra de juridiska aspekterna av privatekonomi mer lättillgängliga och begripliga.

                <br>

                <div style="margin-top: -30px; font-size: 0.8em; padding: 10px 20px 10px 20px; margin-left: 100px; box-shadow: 0 4px 14px -4px rgba(0,0,0,0.1);">
                    
                    <div style="display: inline-block; width: 180px; margin: 10px 10px 10px 0px;">
                        <img src="/assets/img/360x360/dylan.jpg" alt="Dylan" width="180" style="margin-top: 0; margin-bottom: 5px;">
                        <br>
                        Viktors katt Dylan, född 2011. Försäkrad hos <a href="/kattforsakring/svedea">Svedea</a>.
                    </div>
                    <div style="display: inline-block; width: 180px; margin: 10px 10px 10px 0px;">
                        <img src="/assets/img/360x360/sam.jpg" alt="Sam" width="180" style="margin-top: 0; margin-bottom: 5px;">
                        <br>
                        Viktors katt Sam, född 2018. Försäkrad hos <a href="/kattforsakring/svedea">Svedea</a>.
                    </div>
                </div>

            </span>
		</p>

		<p style="padding-left: 100px; position: relative; padding-bottom: 15px;" itemscope itemtype="http://schema.org/Person">
			<img src="/assets/img/160x160/kajsa-amnehagen.jpg" alt="Kajsa Amnehagen" width="80" style="position: absolute; left: 0; top: 5px; filter: grayscale(100%); border-radius: 80px;">
			<strong itemprop="name" class="text-danger">Kajsa Amnehagen</strong><small> - Datakvalitetsansvarig</small>
			<small style="font-weight: 500; color: #999; display: block; padding-bottom: 3px; margin-bottom: 3px;" itemprop="email"><i class="fas fa-envelope"></i> kajsa@veloxia.se</small>
			<span itemprop="description">Kajsa är vår egen faktagranskare som ansvarar för att de uppgifter vi presenterar på Försäkringarna.se är aktuella. Hon har god kännedom om den svenska försäkringsmarknaden och ser till att våra användare uppdateras när någonting händer.</span>
        </p>
        
        <h2>Kontakta oss</h2>

		<div class="highlight border-success faq-answer bg-gray-0">
			<p>

				Behöver du komma i kontakt med oss? Vi finns tillgängliga att besvara dina frågor <strong class="text-success">vardagar 08:00 – 20:00</strong> och <strong class="text-success">helger 10:00 – 15:00</strong>.
		
			</p>
		</div>

		<p>
			E-postadress<br>
			<strong itemprop="email" class="text-success">support@veloxia.se</strong>
		</p>
		<p>
			Telefonnummer<br>
			<strong itemprop="telephone" class="text-success">08 – 520 275 95</strong>
		</p>

    </div>

</section>


@endsection