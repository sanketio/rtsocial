<?php

/**
 * Provide a admin settings markup for the plugin.
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link        https://rtcamp.com
 *
 * @since       2.3.0
 *
 * @package     RTSocial
 * @subpackage  RTSocial / admin / partials
 */
?>
<div class="wrap">
	<h2><?php esc_html_e( 'rtSocial Options', 'rtsocial' ); ?></h2>
	<p class="rt_clear"></p>
	<div id="content_block" class="align_left">
		<form action="options.php" method="post">
			<?php
			// Load settings fields.
			settings_fields( 'rtsocial_plugin_options' );

			do_settings_sections( __FILE__ );

			$options = get_option( 'rtsocial_plugin_options' );
			$labels  = array(
				'tw'    => 'Twitter',
				'fb'    => 'Facebook',
				'lin'   => 'LinkedIn',
				'pin'   => 'Pinterest',
				'gplus' => 'Google+'
			);
			?>
			<div class="metabox-holder align_left rtsocial" id="rtsocial">
				<div class="postbox-container">
					<div class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<div title="<?php esc_attr_e( 'Click to toggle', 'rtsocial' ); ?>" class="handlediv">
								<br/>
							</div>
							<h3 class="hndle"><?php esc_html_e( 'General Settings', 'rtsocial' ); ?></h3>
							<div class="inside">
								<table class="form-table">
									<tr id="rtsocial-placement-settings-row">
										<th scope="row"><?php esc_html_e( 'Placement Settings:', 'rtsocial' ); ?></th>
										<td>
											<fieldset>
												<label>
													<input value="top" name='rtsocial_plugin_options[placement_options_set]' id="rtsocial-top-display" type="radio" <?php echo ( 'top' === $options['placement_options_set'] ) ? ' checked="checked" ' : ''; ?> />
													<span><strong><?php esc_html_e( 'Top', 'rtsocial' ); ?></strong></span>
													<br/>
													<span class="description"><?php esc_html_e( 'Social-media sharing buttons will appear below post-title and above post-content', 'rtsocial' ); ?></span>
												</label>
												<br/>
												<label>
													<input value="bottom" name='rtsocial_plugin_options[placement_options_set]' id="rtsocial-bottom-display" type="radio" <?php echo ( 'bottom' === $options['placement_options_set'] ) ? ' checked="checked" ' : ''; ?> />
													<span><strong><?php esc_html_e( 'Bottom', 'rtsocial' ); ?></strong></span>
													<br/>
													<span class="description"><?php esc_html_e( 'Social-media sharing buttons will appear after (below) post-content', 'rtsocial' ); ?></span>
												</label>
												<br/>
												<label>
													<input value="manual" name='rtsocial_plugin_options[placement_options_set]' id="rtsocial-manual-display" type="radio" <?php echo ( 'manual' === $options['placement_options_set'] ) ? ' checked="checked" ' : ''; ?> />
													<span><strong><?php esc_html_e( 'Manual', 'rtsocial' ); ?></strong></span>
													<br/>
													<span class="description">
														<?php esc_html_e( 'For manual placement, please use this function call in your template:', 'rtsocial' ); ?>
														<br/>
														<strong>&lt;?php if ( function_exists( 'rtsocial' ) ) { echo rtsocial(); } ?&gt;</strong>
													</span>
												</label>
											</fieldset>
										</td>
									</tr>
									<tr>
										<th scope="row"><?php esc_html_e( 'Alignment Settings:', 'rtsocial' ); ?></th>
										<td>
											<fieldset>
												<label>
													<input value="left" name='rtsocial_plugin_options[alignment_options_set]' id="align_left_check" type="radio" <?php echo ( 'left' === $options['alignment_options_set'] ) ? ' checked="checked" ' : ''; ?> />
													<span><?php esc_html_e( 'Left', 'rtsocial' ); ?></span>
												</label>
												<br/>
												<label>
													<input value="center" name='rtsocial_plugin_options[alignment_options_set]' id="align_center_check" type="radio" <?php echo ( 'center' === $options['alignment_options_set'] ) ? ' checked="checked" ' : ''; ?> />
													<span><?php esc_html_e( 'Center', 'rtsocial' ); ?></span>
												</label>
												<br/>
												<label>
													<input value="right" name='rtsocial_plugin_options[alignment_options_set]' id="align_right_check" type="radio" <?php echo ( 'right' === $options['alignment_options_set'] ) ? ' checked="checked" ' : ''; ?> />
													<span><?php esc_html_e( 'Right', 'rtsocial' ); ?></span>
												</label>
												<br/>
												<label>
													<input value="none" name='rtsocial_plugin_options[alignment_options_set]' id="align_none_check" type="radio" <?php echo ( 'none' === $options['alignment_options_set'] ) ? ' checked="checked" ' : ''; ?> />
													<span><?php esc_html_e( 'None', 'rtsocial' ); ?></span>
												</label>
											</fieldset>
										</td>
									</tr>
									<tr>
										<th><?php esc_html_e( 'Your google API key:', 'rtsocial' ); ?></th>
										<td>
											<?php
											$value = '';

											if ( ! empty( $options['google_api_key'] ) ) {
												$value = $options['google_api_key'];
											}
											?>
											<input type="text" value="<?php esc_attr_e( $value ); ?>" id="google_api_key" name="rtsocial_plugin_options[google_api_key]" />
											<a href="https://developers.google.com/+/web/api/rest/oauth" target="_blank"><?php esc_html_e( 'How to create API key?', 'rtsocial' ); ?></a>
										</td>
									</tr>
									<tr>
										<th scope="row"><?php esc_html_e( 'Active Buttons:', 'rtsocial' ); ?></th>
										<td>
											<ul id="rtsocial-sorter-active" class="connectedSortable">
												<?php
												if ( ! empty( $options['active'] ) ) {
													foreach ( $options['active'] as $active ) {
														?>
														<li id="rtsocial-ord-<?php esc_attr_e( $active ); ?>" style="cursor: pointer;">
															<input id="rtsocial-act-<?php esc_attr_e( $active ); ?>" style="display: none;" type="checkbox" name="rtsocial_plugin_options[active][]" value="<?php esc_attr_e( $active ); ?>" checked="checked" />
															<label for="rtsocial-act-<?php esc_attr_e( $active ); ?>"><?php esc_html_e( $labels[ $active ] ); ?></label>
														</li>
														<?php
													}
												}
												?>
											</ul>
											<span class="description">
												<?php esc_html_e( 'Drag buttons around to reorder them OR drop them into \'Inactive\' list to disable them.', 'rtsocial' ); ?>
												<strong><?php esc_html_e( 'All buttons cannot be disabled!', 'rtsocial' ); ?></strong>
											</span>
										</td>
									</tr>
									<tr>
										<th scope="row"><?php esc_html_e( 'Inactive Buttons:', 'rtsocial' ); ?></th>
										<td>
											<ul id="rtsocial-sorter-inactive" class="connectedSortable">
												<?php
												if ( ! empty( $options['inactive'] ) ) {
													foreach ( $options['inactive'] as $inactive ) {
														?>
														<li id="rtsocial-ord-<?php esc_attr_e( $inactive ); ?>" style="cursor: pointer;">
															<input id="rtsocial-act-<?php esc_attr_e( $inactive ); ?>" style="display: none;" type="checkbox" name="rtsocial_plugin_options[inactive][]" value="<?php esc_attr_e( $inactive ); ?>" checked="checked" />
															<label for="rtsocial-act-<?php esc_attr_e( $inactive ); ?>"><?php esc_html_e( $labels[ $inactive ] ); ?></label>
														</li>
														<?php
													}
												}
												?>
											</ul>
											<span class="description"><?php esc_html_e( 'Drop buttons back to \'Active\' list to re-enable them.', 'rtsocial' ); ?></span>
										</td>
									</tr>
									<tr>
										<th scope="row"><?php esc_html_e( 'Hide counts:', 'rtsocial' ); ?></th>
										<td>
											<fieldset>
												<label>
													<input value="1" name='rtsocial_plugin_options[hide_count]' id="hide_count_check" type="checkbox" <?php echo ( isset( $options['hide_count'] ) && ( 1 === $options['hide_count'] ) ) ? ' checked="checked"' : ''; ?> />
													<span><?php esc_html_e( 'Yes', 'rtsocial' ); ?></span>
												</label>
											</fieldset>
										</td>
									</tr>

								</table>
							</div>
						</div>
						<div class="postbox" id="tw_box">
							<div title="<?php esc_attr_e( 'Click to toggle', 'rtsocial' ); ?>" class="handlediv">
								<br/>
							</div>
							<h3 class="hndle"><?php esc_html_e( 'Button Settings', 'rtsocial' ); ?></h3>
							<div class="inside">
								<table class="form-table">
									<tr>
										<th scope="row"><?php esc_html_e( 'Button Style:', 'rtsocial' ); ?></th>
										<td>
											<table id="rtsocial-button-style-inner">
												<tr>
													<td>
														<input value="vertical" id="display_vertical_input" name='rtsocial_plugin_options[display_options_set]' type="radio" <?php echo ( 'vertical' === $options['display_options_set'] ) ? ' checked="checked"' : ''; ?> />
													</td>
													<td>
														<div id="rtsocial-display-vertical-sample" class="rtsocial-vertical rtsocial-container-align-none">
															<div class="rtsocial-fb-vertical">
																<div class="rtsocial-vertical-count">
																	<span class="rtsocial-fb-count"></span>
																	<div class="rtsocial-vertical-notch"></div>
																</div>
																<div class="rtsocial-fb-vertical-button">
																	<a class="rtsocial-fb-button rtsocial-fb-like-light" href="https://www.facebook.com/sharer/sharer.php?u=https://rtcamp.com/rtsocial/" rel="nofollow" target="_blank"><?php esc_html_e( 'Like', 'rtsocial' ); ?></a>
																</div>
															</div>
															<div class="rtsocial-twitter-vertical">
																<div class="rtsocial-twitter-vertical-button">
																	<a class="rtsocial-twitter-button" href="<?php echo esc_url( 'https://twitter.com/intent/tweet?via=' . $options['tw_handle'] . '&related=' . $options['tw_related_handle'] . '&text=' . __( 'rtSocial... Share Fast!', 'rtsocial' ) . '&url=https://rtcamp.com/rtsocial/' ); ?>" rel="nofollow" target="_blank"></a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<input value="horizontal" id="display_horizontal_input" name='rtsocial_plugin_options[display_options_set]' type="radio" <?php echo ( 'horizontal' === $options['display_options_set'] ) ? ' checked="checked"' : ''; ?> />
													</td>
													<td>
														<div id="rtsocial-display-horizontal-sample">
															<div class="rtsocial-fb-horizontal">
																<div class="rtsocial-fb-horizontal-button">
																	<a class="rtsocial-fb-button rtsocial-fb-like-light" href="https://www.facebook.com/sharer/sharer.php?u=https://rtcamp.com/rtsocial/" rel="nofollow" target="_blank"><?php esc_html_e( 'Like', 'rtsocial' ); ?></a>
																</div>
																<div class="rtsocial-horizontal-count">
																	<div class="rtsocial-horizontal-notch"></div>
																	<span class="rtsocial-fb-count"></span>
																</div>
															</div>
															<div class="rtsocial-twitter-horizontal">
																<div class="rtsocial-twitter-horizontal-button">
																	<a class="rtsocial-twitter-button" href="<?php echo esc_url( 'https://twitter.com/intent/tweet?via=' . $options['tw_handle'] . '&related=' . $options['tw_related_handle'] . '&text=' . __( 'rtSocial... Share Fast!', 'rtsocial' ) . '&url=https://rtcamp.com/rtsocial/' ); ?>" rel="nofollow" target="_blank"></a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<input value="icon" id="display_icon_input" name='rtsocial_plugin_options[display_options_set]' type="radio" <?php echo ( 'icon' === $options['display_options_set'] ) ? ' checked="checked"' : ''; ?> />
													</td>
													<td>
														<div id="rtsocial-display-icon-sample">
															<div class="rtsocial-fb-icon">
																<div class="rtsocial-fb-icon-button">
																	<a class="rtsocial-fb-icon-link" href="https://www.facebook.com/sharer/sharer.php?u=https://rtcamp.com/rtsocial/" rel="nofollow" target="_blank"><?php esc_html_e( 'Like', 'rtsocial' ); ?></a>
																</div>
															</div>
															<div class="rtsocial-twitter-icon">
																<div class="rtsocial-twitter-icon-button">
																	<a class="rtsocial-twitter-icon-link" href="<?php echo esc_url( 'https://twitter.com/intent/tweet?via=' . $options['tw_handle'] . '&related=' . $options['tw_related_handle'] . '&text=' . __( 'rtSocial... Share Fast!', 'rtsocial' ) . '&url=https://rtcamp.com/rtsocial/' ); ?>" rel="nofollow" target="_blank"><?php esc_html_e( 'Tweet', 'rtsocial' ); ?></a>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<!--Icons with count-->
												<tr>
													<td>
														<input value="icon-count" id="display_icon_count_input" name='rtsocial_plugin_options[display_options_set]' type="radio" <?php echo ( $options[ 'display_options_set' ] == "icon-count" ) ? ' checked="checked" ' : ''; ?> />
													</td>
													<td>
														<div id="rtsocial-display-icon-count-sample">
															<div class="rtsocial-fb-icon">
																<div class="rtsocial-fb-icon-button">
																	<a class="rtsocial-fb-icon-link" href="https://www.facebook.com/sharer/sharer.php?u=https://rtcamp.com/rtsocial/" rel="nofollow" target="_blank">Like</a>
																</div>
																<div class="rtsocial-horizontal-count">
																	<div class="rtsocial-horizontal-notch"></div>
																	<span class="rtsocial-fb-count">0</span>
																</div>
															</div>
															<div class="rtsocial-twitter-icon">
																<div class="rtsocial-twitter-icon-button">
																	<a class="rtsocial-twitter-icon-link" href="<?php echo esc_url( 'https://twitter.com/intent/tweet?via=' . $options['tw_handle'] . '&related=' . $options['tw_related_handle'] . '&text=' . __( 'rtSocial... Share Fast!', 'rtsocial' ) . '&url=https://rtcamp.com/rtsocial/' ); ?>" rel="nofollow" target="_blank"><?php esc_html_e( 'Tweet', 'rtsocial' ); ?></a>
																</div>
															</div>
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<!--Twitter-->
						<div class="postbox" id="tw_box">
							<div title="<?php esc_attr_e( 'Click to toggle', 'rtsocial' ); ?>" class="handlediv">
								<br/>
							</div>
							<h3 class="hndle"><?php esc_html_e( 'Twitter Button Settings', 'rtsocial' ); ?></h3>
							<div class="inside">
								<table class="form-table">
									<tr>
										<th>
											<span id="rtsocial-twitter"></span>
										</th>
									</tr>
									<tr class="tw_row">
										<th><?php esc_html_e( 'Twitter Handle:', 'rtsocial' ); ?></th>
										<td>
											<input type="text" value="<?php echo esc_attr( $options['tw_handle'] ); ?>" id="tw_handle" name="rtsocial_plugin_options[tw_handle]" />
										</td>
										<td>&nbsp;</td>
									</tr>
									<tr class="tw_row">
										<th><?php esc_html_e( 'Related Twitter Handle:', 'rtsocial' ); ?></th>
										<td>
											<input type="text" value="<?php echo esc_attr( $options['tw_related_handle' ] ); ?>" id="tw_related_handle" name="rtsocial_plugin_options[tw_related_handle]" />
										</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
						</div>
						<!--Facebook-->
						<div class="postbox">
							<div title="<?php esc_attr_e( 'Click to toggle', 'rtsocial' ); ?>" class="handlediv">
								<br/>
							</div>
							<h3 class="hndle"><?php esc_html_e( 'Facebook Button Settings', 'rtsocial' ); ?></h3>
							<div class="inside">
								<table class="form-table">
									<tr class="fb_title">
										<th>
											<span id="rtsocial-facebook"></span>
										</th>
									</tr>
									<tr class="fb_row">
										<th><?php esc_html_e( 'Facebook Button Style:', 'rtsocial' ); ?></th>
										<td>
											<input type="radio" name='rtsocial_plugin_options[fb_style]' value="like_light" id="rtsocial-like-light-input" <?php echo ( 'like_light' === $options['fb_style'] ) ? ' checked="checked" ' : '' ?> />
											<label for="rtsocial-like-light-input">
												<a id="rtsocial-like-light"></a>
											</label>
										</td>
										<td>
											<input type="radio" name='rtsocial_plugin_options[fb_style]' value="recommend_light" id="rtsocial-recommend-light-input" <?php echo ( 'recommend_light' === $options['fb_style'] ) ? ' checked="checked" ' : '' ?> />
											<label for="rtsocial-recommend-light-input">
												<a id="rtsocial-recommend-light"></a>
											</label>
										</td>
									</tr>
									<tr class="fb_row">
										<th>&nbsp;</th>
										<td>
											<input type="radio" name='rtsocial_plugin_options[fb_style]' value="like_dark" id="rtsocial-like-dark-input" <?php echo ( 'like_dark' === $options['fb_style'] ) ? ' checked="checked" ' : '' ?> />
											<label for="rtsocial-like-dark-input">
												<a id="rtsocial-like-dark"></a>
											</label>
										</td>
										<td>
											<input type="radio" name='rtsocial_plugin_options[fb_style]' value="recommend_dark" id="rtsocial-recommend-dark-input" <?php echo ( 'recommend_dark' === $options[ 'fb_style' ] ) ? ' checked="checked" ' : '' ?> />
											<label for="rtsocial-recommend-dark-input">
												<a id="rtsocial-recommend-dark"></a>
											</label>
										</td>
									</tr>
									<tr class="fb_row">
										<th>&nbsp;</th>
										<td>
											<input type="radio" name='rtsocial_plugin_options[fb_style]' value="share" id="rtsocial-share-input" <?php echo ( 'share' === $options['fb_style'] ) ? ' checked="checked" ' : '' ?> />
											<label for="rtsocial-share-input">
												<a id="rtsocial-share-plain"></a>
											</label>
										</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</div>
						</div>
						<p class="submit">
							<input type="submit" name="save" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'rtsocial' ); ?>" />
						</p>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div id="rtsocial_ads_block" class="metabox-holder align_left">
		<div class="postbox-container">
			<div class="meta-box-sortables ui-sortable">
				<div class="postbox" id="social">
					<div title="<?php esc_attr_e( 'Click to toggle', 'rtsocial' ); ?>" class="handlediv">
						<br/>
					</div>
					<h3 class="hndle">
                        <span>
                            <strong><?php esc_html_e( 'Getting Social is Good', 'rtsocial' ); ?></strong>
                        </span>
					</h3>
					<div class="inside rt-social-connect">
						<a href="https://www.facebook.com/rtCamp.solutions" rel="nofollow" target="_blank" title="<?php esc_attr_e( 'Become a fan on Facebook', 'rtsocial' ); ?>" class="rt-sidebar-facebook"><?php esc_html_e( 'Facebook', 'rtsocial' ); ?></a>
						<a href="https://twitter.com/rtcamp" rel="nofollow" target="_blank" title="<?php esc_attr_e( 'Follow us on Twitter', 'rtsocial' ); ?>" class="rt-sidebar-twitter"><?php esc_html_e( 'Twitter', 'rtsocial' ); ?></a>
						<a href="https://feeds.feedburner.com/rtcamp" rel="nofollow" target="_blank" title="<?php esc_attr_e( 'Subscribe to our Feeds', 'rtsocial' ); ?>" class="rt-sidebar-rss"><?php esc_html_e( 'RSS', 'rtsocial' ); ?></a>
					</div>
				</div>
				<div class="postbox" id="donations">
					<div title="<?php esc_attr_e( 'Click to toggle', 'rtsocial' ); ?>" class="handlediv">
						<br/>
					</div>
					<h3 class="hndle">
                        <span>
                            <strong><?php esc_html_e( 'Promote, Donate, Share...', 'rtsocial' ); ?></strong>
                        </span>
					</h3>
					<div class="inside">
						<?php esc_html_e( 'Buy coffee/beer for team behind', 'rtsocial' ); ?> <a href="https://rtcamp.com/rtsocial/" title="<?php esc_attr_e( 'rtSocial Plugin', 'rtsocial' ); ?>"><?php esc_html_e( 'rtSocial', 'rtsocial' ); ?></a>.
						<br/><br/>
						<div class="rt-paypal" style="text-align:center">
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
								<input type="hidden" name="cmd" value="_donations" />
								<input type="hidden" name="business" value="paypal@rtcamp.com" />
								<input type="hidden" name="lc" value="US" />
								<input type="hidden" name="item_name" value="rtSocial" />
								<input type="hidden" name="no_note" value="0" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest" />
								<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="<?php esc_attr_e( 'PayPal - The safer, easier way to pay online!', 'rtsocial' ); ?>" />
								<img border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" alt="pixel" />
							</form>
						</div>
						<div class="rtsocial-share" style="text-align:center; width: 127px; margin: 2px auto">
							<div class="rt-facebook" style="float:left; margin-right:5px;">
								<a style=" text-align:center;" name="fb_share" type="box_count" title="<?php esc_attr_e( 'rtSocial: Simple, Smarter & Swifter Social Sharing WordPress Plugin', 'rtsocial' ); ?>" share_url="https://rtcamp.com/rtsocial/"></a>
							</div>
							<div class="rt-twitter">
								<a href="https://twitter.com/share" title="<?php esc_attr_e( 'rtSocial: Simple, Smarter & Swifter Social Sharing WordPress Plugin', 'rtsocial' ); ?>" class="twitter-share-button" data-text="<?php esc_attr_e( 'rtSocial: Simple, Smarter & Swifter Social Sharing #WordPress #Plugin', 'rtsocial' ); ?>" data-url="https://rtcamp.com/rtsocial/" data-count="vertical" data-via="rtCamp"><?php esc_html_e( 'Tweet', 'rtsocial' ); ?></a>
								<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
							</div>
							<div class="rt_clear"></div>
						</div>
					</div>
					<!-- end of .inside -->
				</div>
				<div class="postbox" id="support">
					<div title="<?php esc_attr_e( 'Click to toggle', 'rtsocial' ); ?>" class="handlediv">
						<br/>
					</div>
					<h3 class="hndle">
                        <span>
                            <strong><?php esc_html_e( 'Free Support', 'rtsocial' ); ?></strong>
                        </span>
					</h3>
					<div class="inside"><?php echo sprintf( __( 'If you have any problems with this plugin or good ideas for improvements, please talk about them in the <a href="%s" rel="nofollow" target="_blank" title="%s">free support forums</a>.', 'rtsocial' ), 'http://community.rtcamp.com/c/rtsocial', esc_html__( 'free support forum', 'rtsocial' ) ); ?> </div>
				</div>
				<div class="postbox" id="latest_news">
					<div title="<?php esc_attr_e( 'Click to toggle', 'rtsocial' ); ?>" class="handlediv">
						<br/>
					</div>
					<h3 class="hndle">
                        <span>
                            <strong><?php esc_html_e( 'Latest News', 'rtsocial' ); ?></strong>
                        </span>
					</h3>
					<div class="inside"><?php //rtsocial_get_feeds(); ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
