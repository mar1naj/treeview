<?php
// src/Passport/Bundle/TreeviewBundle/Validator/Constraints/ContainsAlphanumeric.php
namespace Passport\Bundle\TreeviewBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsAlphanumeric extends Constraint
{
    public $message = 'The number "%string%" contains an illegal character: it can only contain numbers.';
}


?>