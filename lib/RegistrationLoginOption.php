<?php

declare(strict_types=1);
/**
 * SPDX-FileCopyrightText: 2020 Nextcloud GmbH and Nextcloud contributors
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OCA\Registration;

use OCP\Authentication\IAlternativeLogin;
use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\IConfig;

class RegistrationLoginOption implements IAlternativeLogin {

	public function __construct(protected IConfig $config, protected IURLGenerator $url, protected IL10N $l, protected \OC_Defaults $theming) {
		$this->config = $config;
	}

	public function getLabel(): string {
		if ($this->config->getAppValue('registration', 'login_button_visible', 'yes') === 'yes') {
			return $this->l->t('Register');
		}
	}

	public function getLink(): string {
		if ($this->config->getAppValue('registration', 'login_button_visible', 'yes') === 'yes') {
			return $this->url->linkToRoute('registration.register.showEmailForm');
		}
	}

	public function getClass(): string {
		if ($this->config->getAppValue('registration', 'login_button_visible', 'yes') === 'yes') {
			return 'register-button';
		}
	}

	public function load(): void {
	}
}
