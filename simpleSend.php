<?php
	
	include('UserProposal.php');

	// Je l'aurai placer dans le service du bundle ou l'object UserProposal est placer avec un public devant
	function simpleSend($userProposals, $dateEnd, $nbMinSend) {
		$date           = new \DateTime();
		$diff           = $date->diff($dateEnd);
		$interval       = intval($diff->format('%i'));
		$nbUserProposal = count($userProposals);

		// calcul combien on envoie de mail par tranche de 5min et nombre de tranche
		$nbInterval      = intval($interval / 5);
		$sendPerInterval = intval($nbUserProposal / $nbInterval);
		if ($sendPerInterval < $nbMinSend) {
			$sendPerInterval = $nbMinSend;
		}

		// remplis le tableau d'object avec les bonnes valeur d'envoie
		// j'aurai utiliser la commande pour trouver les mails a envoyer en fonction de la date ajouter ici
		// je rajouterai une variable pour dire que la proposition a bien été envoyer
		$inc = 0;
		foreach ($userProposals as $userProposal) {
			if (0 === $inc % $sendPerInterval) {
				$date->add(new \DateInterval('PT5M'));
			}

			$userProposal->setSendDate($date);
			$inc++;
		}

		return $userProposals;
	}

	$userProposals = [];
	for ($i = 1; $i <= 100; $i++) {
		array_push($userProposals, new UserProposal(
			$i,
			'message for user proposal ' . $i,
			$i,
			UserProposal::TYPE_OFFER['survey']
		)); 
	}

	$dateEnd = new \DateTime();
	$dateEnd->add(new \DateInterval('PT' . 31 . 'M')); 

	$userProposals = simpleSend($userProposals, $dateEnd, 17);

	foreach ($userProposals as $userProposal) {
		print $userProposal->getSendDate()->format('Y-m-d H:i') . "\n";
	}	
?>