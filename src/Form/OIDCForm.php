<?php

namespace OIDC\Form;

use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Form\Element\Url;
use Laminas\Form\Element\Text;
use Laminas\Form\Element\Select;
use Laminas\Form\Element\Password;
use Omeka\Form\Element\RoleSelect;
use Omeka\Form\Element\SiteSelect;
use Laminas\Form\Form;
use Laminas\InputFilter\InputFilterProviderInterface;
use Laminas\Validator\StringLength;

class OIDCForm extends Form
{
    public function init() : void
    {
        // Discovery Document URI
        $this->add([
            'name'    => 'oidc_discovery',
            'type'    => Url::class,
            'options' => [
                'label' => 'Discovery Document URI',
                'info'  => 'Discovery endpoint for the OIDC provider.',
            ],
            'attributes' => [
                'id' => 'oidc_discovery',
                'required' => true,
            ]
        ]);

        // OIDC Scopes
        $this->add([
            'name'    => 'oidc_scopes',
            'type'    => Text::class,
            'options' => [
                'label' => 'OIDC Scopes',
                'info'  => 'Space-separated list of scopes to request (e.g., "openid email profile roles"). Always include "openid".',
            ],
            'attributes' => [
                'id' => 'oidc_scopes',
                'required' => true,
                'placeholder' => 'openid email profile',
            ]
        ]);

        // Token endpoint auth method
        $this->add([
            'name'    => 'oidc_token_endpoint_auth_method',
            'type'    => Select::class,
            'options' => [
                'label' => 'Token endpoint auth method',
                'info'  => 'How the client authenticates to the token endpoint. If unsure, use client_secret_basic or ask your IdP admin.',
                'value_options' => [
                    'client_secret_basic' => 'client_secret_basic',
                    'client_secret_post' => 'client_secret_post',
                    'client_secret_jwt' => 'client_secret_jwt',
                    'private_key_jwt' => 'private_key_jwt',
                    'none' => 'none (public client)'
                ],
            ],
            'attributes' => [
                'id' => 'oidc_token_endpoint_auth_method',
            ]
        ]);

	/*
       //Default role for new users
        $this->add([
            'name'    => 'oidc_role',
            'type'    => RoleSelect::class,
            'options' => [
                'label' => 'New user role',
                'info'  => 'Role to automatically assign to new users.',
            ],
            'attributes' => [
                'id' => 'oidc_role',
                'required' => true,
            ]
        ]);

        //Default site for new users
        $this->add([
            'name'    => 'oidc_site',
            'type'    => SiteSelect::class,
            'options' => [
                'label' => 'New user site',
		        'info'  => 'Site to grant access for new users.',
            ],
            'attributes' => [
                'id' => 'oidc_site',
        		'required' => false,
            ]
	]);
	 */

	// …
    }
}
