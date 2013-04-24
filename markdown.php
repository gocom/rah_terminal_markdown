<?php

/**
 * Generates HTML markup from supplied Markdown markup.
 *
 * @author    Jukka Svahn
 * @date      2012-
 * @license   GNU GPLv2
 * @link      https://github.com/gocom/rah_terminal_markdown
 *
 * Copyright (C) 2013 Jukka Svahn http://rahforum.biz
 * Licensed under GNU Genral Public License version 2
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

class rah_terminal_markdown
{
	/**
	 * Constructor.
	 */

	public function __construct()
	{
		register_callback(array($this, 'register'), 'rah_terminal', '', 1);
	}

	/**
	 * Registers a terminal option.
	 */

	public function register()
	{
		add_privs('rah_terminal.markdown', '1,2,3,4');
		rah_terminal::get()->add_terminal('markdown', 'Markdown', array($this, 'process'));
	}

	/**
	 * Processes Markdown and renders HTML.
	 *
	 * @param  string $markup Markdown markup
	 * @return string HTML
	 */

	public function process($markup)
	{
		return \Michelf\MarkdownExtra::defaultTransform($markup);
	}
}

new rah_terminal_markdown();