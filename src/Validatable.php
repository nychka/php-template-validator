<?php

namespace Epam;

interface Validatable
{
	public function validate($data);

	public function isValid();
}