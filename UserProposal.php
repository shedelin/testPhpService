<?php

class UserProposal {
	
	const TYPE_OFFER = [
		'longMission'  => 'LONG_MISSION',
		'shortMission' => 'SHORT_MISSION',
		'survey'       => 'SURVEY',
	];

	public $id;
	public $message;
	public $priority;
	public $typeOffer;
	public $created;
	public $sendDate;

	public function __construct(int $id, string $message, int $priority, string $typeOffer) {
		$this->id        = $id;
		$this->message   = $message;
		$this->priority  = $priority;
		$this->typeOffer = $typeOffer;
		$this->created    = new \DateTime();
	}

	public function getId() {
		return $this->id;
	}

	public function setId(int $id) {
		$this->id = $id;
	}

	public function getMessage() {
		return $this->message;
	}

	public function setMessage(string $message) {
		$this->message = $message;
	}

	public function getPriority() {
		return $this->priority;
	}

	public function setPriority(int $priority) {
		$this->priority = $priority;
	}

	public function getTypeOffer() {
		return $this->typeOffer;
	}

	public function setTypeOffer(string $typeOffer) {
		$this->typeOffer = $typeOffer;
	}

	public function getCreated() {
		return $this->created;
	}

	public function setCreated(\DateTime $created) {
		$this->created = $created;
	}

	public function getSendDate() {
		return $this->sendDate;
	}

	public function setSendDate(\DateTime $sendDate) {
		$this->sendDate = $sendDate;
	}

}

?>