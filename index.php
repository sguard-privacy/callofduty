<?php

require_once 'inc/log_bdd.php';
require_once 'inc/fonction.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call of Duty : Black Ops 3</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
	<script src="assets/js/script.js" async ></script>
</head>
	<body class="body">
		<nav class="navbar navbar-expand-lg">
			<div class="container-fluid">
				<a
					class="navbar-brand"
					href="https://www.callofduty.com/fr/blackops3"
					target="_blank"
				>
					<img
						class="back1"
						src="https://res.cloudinary.com/dlcwbucwf/image/upload/c_scale,h_40,w_120/v1669104767/folder/logo_bo3_b9k5au.webp"
						alt="logo"
					/>
				</a>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mx-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#Accueil">Accueil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#campagne">Multijoueurs</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#campagne">Zombie</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#campagne">Campagne</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#gameplay">Gameplay</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="marche.php">March?? Noir</a>
						</li>
						<li class="nav-item">
							<button
								type="button"
								class="btn btn-primary"
								data-bs-toggle="modal"
								data-bs-target="#exampleModal"
							>
								CONTACT
							</button>
						</li>
					</ul>
				</div>
			</div>
			<!-- Modal -->
			<div
				class="modal fade"
				id="exampleModal"
				tabindex="-1"
				aria-labelledby="exampleModalLabel"
				aria-hidden="true"
			>
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								Formulaire de Contact
							</h5>
							<button
								type="button"
								class="btn-close"
								data-bs-dismiss="modal"
								aria-label="Close"
							></button>
						</div>
						<div class="modal-body">
							<section class="form-section">
								<form
									name="contactform"
									method="post"
									class="need-validation"
									novalidate
									id="forms"
								>
									<div class="contactblock">
										<p class="blockname">Entrez vos informations de Contact</p>
										<hr />
										<div class="contactdetails">
											<div class="form-group row">
												<label for="Pr??nom" class="col-sm-2 col-form-label"
													>Pr??nom*</label
												>
												<div class="col-sm-6">
													<input
														name="pname"
														type="text"
														class="form-control"
														id="Pr??nom"
														autocomplete="off"
														required=""
													/>
													<div class="invalid-feedback">
														Veuillez entrer votre pr??nom.
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label for="Nom" class="col-sm-2 col-form-label"
													>Nom*</label
												>
												<div class="col-sm-6">
													<input
														type="text"
														class="form-control"
														id="Nom"
														name="nname"
														autocomplete="off"
														required=""
													/>
													<div class="invalid-feedback">
														Veuillez entrer un Nom.
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label for="Email" class="col-sm-2 col-form-label"
													>Email*</label
												>
												<div class="col-sm-6">
													<input
														type="email"
														class="form-control"
														id="Email"
														name="ename"
														placeholder="xx@yy.com"
														autocomplete="off"
														required=""
													/>
													<div class="invalid-feedback">
														Veuillez entrer votre Email.
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label
													for="Message"
													class="col-md-12 col-form-label"
													>Message*</label
												>
												<div class="col-md-12">
													<textarea
														id="Message"
														name="mname"
														class="form-control"
														placeholder="Votre Message"
														rows="4"
														required=""
													></textarea>
													<div class="invalid-feedback">
														Veuillez ??crire dans ce champs.
													</div>
												</div>
											</div>
											<input type="hidden" id="amountopay" value="" />
											<div class="click">
												<button
													id="customButton"
													type="Envoyer"
													class="btn btn-success btn-block"
												>
													Envoyer
												</button>
											</div>
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="bg-image">
			<h1 class="text-white">DISPONIBLE SUR CONSOLES ET PC</h1>
		</div>
		<nav>
			<div class="container">
				<div class="row-carouselcallof">
					<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
						<div class="carousel-indicators">
							<button
								type="button"
								data-bs-target="#carouselExampleCaptions"
								data-bs-slide-to="0"
								class="active"
								aria-current="true"
								aria-label="Slide 1"
							></button>
							<button
								type="button"
								data-bs-target="#carouselExampleCaptions"
								data-bs-slide-to="1"
								aria-label="Slide 2"
							></button>
							<button
								type="button"
								data-bs-target="#carouselExampleCaptions"
								data-bs-slide-to="2"
								aria-label="Slide 3"
							></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img
									src="https://res.cloudinary.com/dlcwbucwf/image/upload/v1669104847/folder/0gu4_q2lcbc.webp"
									class="d-block w-100"
									alt="Campagne photo"
								/>
								<div class="carousel-caption d-none d-md-block">
									<h5 id="campagne">CAMPAGNE</h5>
									<p>
										en 2065. Une nouvelle esp??ce de soldats Black Ops a ??merg??
										et la fronti??re se brouille entre l'humanit?? et la robotique
										militaire de pointe qui d??finit le combat du futur
									</p>
								</div>
							</div>
							<div class="carousel-item">
								<img
									src="https://res.cloudinary.com/dlcwbucwf/image/upload/v1669104921/folder/zkda_n0ubtg.webp"
									class="d-block w-100"
									alt="Zombies"
								/>
								<div class="carousel-caption d-none d-md-block">
									<h5 id="zombie">ZOMBIES</h5>
									<p>
										Call of Duty: Black Ops III Zombies est le plus ambitieux et
										le plus immersif des Call of Duty Zombies ?? ce jour. Shadows
										of Evil apporte les t??n??bres et le chaos comme jamais
										auparavant tout en proposant un gameplay unique et innovant,
										en plus d'un sc??nario captivant et d'un syst??me de
										progression bas?? sur l'EXP.
									</p>
								</div>
							</div>
							<div class="carousel-item">
								<img
									src="https://res.cloudinary.com/dlcwbucwf/image/upload/v1669104955/folder/qits_kdgnxy.webp"
									class="d-block w-100"
									alt="Multijoueur"
								/>
								<div class="carousel-caption d-none d-md-block">
									<h5 id="multijoueur">MULTIJOUEUR</h5>
									<p>
										Le mode multijoueur de Call of Duty: Black Ops III red??finit
										la fa??on de jouer ?? call of duty. Il offre l'exp??rience de
										jeu la plus enrichissante et la plus attrayante de la
										franchise avec un nouveau syst??me fluide bas?? sur les
										encha??nements de mouvements, de nouvelles fa??on de monter en
										grade, de personnaliser et de s'??quiper pour le combat.
									</p>
								</div>
							</div>
						</div>
						<button
							class="carousel-control-prev"
							type="button"
							data-bs-target="#carouselExampleCaptions"
							data-bs-slide="prev"
						>
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button
							class="carousel-control-next"
							type="button"
							data-bs-target="#carouselExampleCaptions"
							data-bs-slide="next"
						>
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
					<br />
					<h2 class="text-white3">CALL OF DUTY BLACK OPS 3 :</h2>
					<br />
					<p class="cmp">
						RENTREZ DANS LA PEAU DE SOLDAT D'??LITES ?? TRAVERS DES MISSIONS SOLO OU LE
						MODE MULTIJOUEURS. VOUS POURREZ MONTER EN GRADE, PERSONNALISER ET ??QUIPER
						VOS SP??CIALISTES DE MANI??RE DIFF??RENTE. <br />
						LE SYST??ME DE SP??CIALISTES PERMET AUX JOUEURS DE CHOISIR PARMI UNE S??LECTION
						DE SOLDATS D'??LITES. CHACUN D'ENTRE EUX POSS??DE UNE APPARENCE, UNE
						PERSONNALIT?? ET UNE VOIX SP??CIFIQUES.
						<br />
						LA LICENCE CALL OF DUTY A TOUJOURS PROPOS?? DES MODES DE JEU DIVERS ET VARI??S
						?? SES UTILISATEURS. DEPUIS SES D??BUTS LA FRANCHISE A ??VOLU??, D??VELOPPANT DE
						NOUVELLES PERSPECTIVES DE JEU TOUT EN Y IMPL??MENTANT DE NOUVEAUX SCH??MAS DE
						JEU ?? OBJECTIFS : VOUS POURREZ VOUS BATTRE DANS PLUS DE 10 MODES DE JEUX TEL
						QUE LES CLASSIQUES MATCH ?? MORT PAR ??QUIPES OU ALORS LE MODE DOMINATION OU
						VOTRE BUT SERA DE CONTR??LER LE MAXIMUM DE BASES POUR MARQUER PLUS DE POINTS
						QUE L'ADVERSAIRE.
					</p>
					<div class="container">
						<div class="row">
							<div class="col-6">
								<img
									class="cloudi"
									src="https://res.cloudinary.com/dlcwbucwf/image/upload/v1669105102/folder/m214_rcktrk.webp"
									alt="imgbo"
								/>
							</div>
							<div class="col-6">
								<img
									class="cloudi"
									src="https://res.cloudinary.com/dlcwbucwf/image/upload/v1669105141/folder/da7q_atiaan.webp"
									alt="imgbo2"
								/>
							</div>
						</div>
					</div>
					<br /><br /><br /><br /><br />
					<h5 class="vidt" id="gameplay">
						DECOUVREZ LA CARTE COMBINE DU MODE MULTIJOUEUR
					</h5>
					<div class="ratio ratio-16x9">
						<iframe
							src="https://www.youtube.com/embed/glEH8cSaJNc"
							title="gameplaybo"
							allowfullscreen
						></iframe>
						<div class="card">
							<img
								class="card-img-top"
								src="https://res.cloudinary.com/dlcwbucwf/image/upload/v1669105213/folder/9kfx_hiror1.webp"
								alt="march?? noir"
							/>
							<div class="card-body">
								<p class="card-text">
									Le March?? noir est la boutique o?? vous pouvez obtenir les
									??quipements les plus terribles pour le multijoueur. Vous pouvez
									??changer vos cl??s de cryptage durement gagn??es contre des
									largages de ravitaillement incluant de tout nouveaux contenus
									multijoueur pour am??liorer votre jeu et faire la diff??rence. Les
									cl??s de cryptage gagn??es en multijoueur peuvent ??tre ??chang??es
									contre des largages de ravitaillement dans le March?? noir.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</body>
	<footer class="foot">
		<!-- Copyright -->

		<div class="text-center text-white-footer p-3">
			<p>?? 2022 Copyright:
			Call of Duty Black Ops 3</p>
		</div>
		<!-- Copyright -->
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
			crossorigin="anonymous"
		></script>
</html>
