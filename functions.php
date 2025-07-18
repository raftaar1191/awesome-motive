<?php
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Theme functions and definitions
 *
 * @package MyBlockTheme
 */

/**
 * Enqueue theme styles.
 */
function mytheme_enqueue_styles() {

	$style_path      = get_template_directory() . '/build/css/frontend.css';
	$style_url       = get_template_directory_uri() . '/build/css/frontend.css';
	$asset_file_path = get_template_directory() . '/build/css/frontend.asset.php';

	// Fallback in case asset file is missing.
	$asset_data = array(
		'dependencies' => array(),
		'version'      => filemtime( $style_path ),
	);

	if ( file_exists( $asset_file_path ) ) {
		$asset_data = include $asset_file_path;
	}

	wp_register_style(
		'am-landing-page-style',
		$style_url,
		$asset_data['dependencies'],
		$asset_data['version']
	);
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_styles' );

/**
 * Register custom shortcode: [landing-page]
 */
function am_landing_page_shortcode() {

	// Enqueue the style.
	wp_enqueue_style( 'am-landing-page-style' );

	ob_start();
	$theme_url = get_stylesheet_directory_uri();
	$thumbnail_url = $theme_url . '/build/media/video-thumbnail.png';
	$screenshot_1_url = $theme_url . '/build/media/screenshot-01.png';
	$screenshot_2_url = $theme_url . '/build/media/screenshot-02.png';
	$screenshot_3_url = $theme_url . '/build/media/screenshot-03.png';

	?>
	<div class="wpforms-formpages-wrapper">
		<section class="hero">
			<h1>Form Pages <span class="badge">PRO</span></h1>
			<p>
				Want to improve your form conversions? Form Pages by WPForms <br />

				allows you to create completely custom “distraction-free” form landing
				pages to boost conversions (without writing any code).
			</p>

			<div class="buttons">
				<button class="light">Try the Demo</button>
				<button class="orange">Get WPForms Now</button>
			</div>
		</section>

		<div class="thumbnail" onclick="playVideo()">
			<img src="<?php echo $thumbnail_url; ?>" alt="Form Preview" />
		</div>

		<section class="features">
			<div>
				<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
					d="M24.0417 26.199C26.9635 26.199 29.3843 23.8616 29.3843 20.8564C29.3843 17.9347 26.9635 15.5138 24.0417 15.5138C23.9583 15.5138 23.8748 15.5973 23.7913 15.5973C23.8748 15.9312 24.0417 16.5155 24.0417 16.9329C24.0417 19.1034 22.2052 20.9399 20.0348 20.9399C19.6174 20.9399 19.033 20.7729 18.6991 20.6894C18.6991 20.7729 18.6991 20.8564 18.6991 20.8564C18.6991 23.8616 21.0365 26.199 24.0417 26.199ZM47.7496 22.359C43.2417 13.5103 34.2261 7.49988 24.0417 7.49988C13.7739 7.49988 4.75826 13.5103 0.250435 22.359C0.0834783 22.6929 0 23.1938 0 23.6112C0 23.9451 0.0834783 24.446 0.250435 24.7799C4.75826 33.6286 13.7739 39.5555 24.0417 39.5555C34.2261 39.5555 43.2417 33.6286 47.7496 24.7799C47.9165 24.446 48 23.9451 48 23.5277C48 23.1938 47.9165 22.6929 47.7496 22.359ZM24.0417 10.1712C29.8852 10.1712 34.727 15.0129 34.727 20.8564C34.727 26.7834 29.8852 31.5416 24.0417 31.5416C18.1148 31.5416 13.3565 26.7834 13.3565 20.8564C13.3565 15.0129 18.1148 10.2547 24.0417 10.1712ZM24.0417 36.8842C15.0261 36.8842 6.84522 31.7921 2.6713 23.5277C4.67478 19.6042 9.51652 14.7625 13.44 12.759C11.687 15.0129 10.6852 17.8512 10.6852 20.8564C10.6852 28.286 16.6122 34.2129 24.0417 34.2129C31.3878 34.2129 37.3983 28.286 37.3983 20.8564C37.3983 17.8512 36.313 15.0129 34.56 12.759C38.4835 14.7625 43.3252 19.6042 45.4122 23.5277C41.1548 31.7921 32.9739 36.8842 24.0417 36.8842Z"
					fill="#E27730"
					/>
				</svg>
				<h3>Distraction Free Landing Pages</h3>

				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
					hendrerit. Pellentesque aliquet nibh nec urna.
				</p>
			</div>

			<div>
				<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" >
					<path
					d="M42.6562 0C41.1562 0 39.75 0.65625 38.7188 1.6875C18.2812 19.875 15.8438 20.3438 16.7812 26.4375C12.9375 26.9062 9.46875 28.7812 7.40625 34.125C7.125 34.7812 6.5625 35.1562 5.90625 35.1562C4.6875 35.1562 1.03125 32.25 0 31.5C0 40.3125 4.03125 48 13.6875 48C24.6562 48 27.9375 39.8438 27.2812 34.4062C32.5312 33.75 36.375 28.5 46.5938 9.375C47.3438 7.96875 48 6.46875 48 4.875C48 2.0625 45.375 0 42.6562 0ZM22.125 41.8125C20.25 43.9688 17.4375 45 13.6875 45C7.6875 45 4.96875 41.4375 3.84375 37.6875C4.59375 37.9688 5.25 38.1562 5.90625 38.1562C7.78125 38.1562 9.5625 37.0312 10.2188 35.1562C10.875 33.5625 11.7188 30.0938 18.0938 29.3438L24.1875 34.125C24.5625 36.9375 24.0938 39.5625 22.125 41.8125ZM43.9688 7.96875C32.8125 28.6875 30.4688 30.9375 25.7812 31.5L19.9688 27C19.125 21.75 18.5625 23.7188 40.7812 3.84375C41.3438 3.375 42 3 42.6562 3C43.7812 3 45 3.75 45 4.875C45 5.90625 44.4375 7.03125 43.9688 7.96875Z"
					fill="#E27730"
					/>
				</svg>

				<h3>Distraction Free Landing Pages</h3>

				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
					hendrerit. Pellentesque aliquet nibh nec urna.
				</p>
			</div>

			<div>
				<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
					d="M9 40.5C9.75 40.5 10.5 39.8438 10.5 39C10.5 38.25 9.75 37.5 9 37.5C8.15625 37.5 7.5 38.25 7.5 39C7.5 39.8438 8.15625 40.5 9 40.5ZM45 30H30.6562L40.7812 19.9688C41.9062 18.75 41.9062 16.875 40.7812 15.75L32.25 7.21875C31.6875 6.65625 30.9375 6.375 30.1875 6.375C29.4375 6.375 28.5938 6.65625 28.0312 7.21875L18 17.3438V3C18 1.40625 16.5938 0 15 0H3C1.3125 0 0 1.40625 0 3V39C0 44.0625 3.9375 48 9 48H45C46.5938 48 48 46.6875 48 45V33C48 31.4062 46.5938 30 45 30ZM15 39C15 42.375 12.2812 45 9 45C5.625 45 3 42.375 3 39V27H15V39ZM15 24H3V15H15V24ZM15 12H3V3H15V12ZM18 21.5625L30.1875 9.375L38.625 17.8125L18 38.5312V21.5625ZM45 45H15.6562L27.6562 33H45V45Z"
					fill="#E27730"
					/>
				</svg>

				<h3>Distraction Free Landing Pages</h3>

				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
					hendrerit. Pellentesque aliquet nibh nec urna.
				</p>
			</div>

			<div class="remove-border-bottom">
				<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" >
					<path
					d="M43.5 6H4.5C1.96875 6 0 8.0625 0 10.5V37.5C0 40.0312 1.96875 42 4.5 42H43.5C45.9375 42 48 40.0312 48 37.5V10.5C48 8.0625 45.9375 6 43.5 6ZM45 37.5C45 38.3438 44.25 39 43.5 39H4.5C3.65625 39 3 38.3438 3 37.5V10.5C3 9.75 3.65625 9 4.5 9H43.5C44.25 9 45 9.75 45 10.5V37.5ZM10.5 21.75C13.3125 21.75 15.75 19.4062 15.75 16.5C15.75 13.6875 13.3125 11.25 10.5 11.25C7.59375 11.25 5.25 13.6875 5.25 16.5C5.25 19.4062 7.59375 21.75 10.5 21.75ZM10.5 14.25C11.7188 14.25 12.75 15.2812 12.75 16.5C12.75 17.8125 11.7188 18.75 10.5 18.75C9.1875 18.75 8.25 17.8125 8.25 16.5C8.25 15.2812 9.1875 14.25 10.5 14.25ZM29.9062 16.5L21 25.4062L18 22.5C17.1562 21.5625 15.75 21.5625 14.9062 22.5L6.65625 30.75C6.28125 31.0312 6 31.7812 6 32.25V34.875C6 35.5312 6.46875 36 7.125 36H40.875C41.4375 36 42 35.5312 42 34.875V26.25C42 25.6875 41.7188 25.125 41.25 24.75L33 16.5C32.1562 15.5625 30.75 15.5625 29.9062 16.5ZM39 33H9V32.625L16.5 25.125L21 29.625L31.5 19.125L39 26.625V33Z"
					fill="#E27730"
					/>
				</svg>

				<h3>Distraction Free Landing Pages</h3>

				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
					hendrerit. Pellentesque aliquet nibh nec urna.
				</p>
			</div>

			<div class="remove-border-bottom">
				<svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg" >
					<path
					d="M16.2581 19.6612C17.4194 19.6612 18.4839 20.4354 19.2581 21.6934L20.2258 23.3386C20.4194 23.7257 20.8065 23.8225 21.0968 23.7257C21.3871 23.6289 21.6774 23.3386 21.6774 22.9515C21.2903 18.887 18.4839 15.9837 16.2581 15.9837C13.9355 15.9837 11.129 18.887 10.8387 22.9515C10.7419 23.3386 11.0323 23.6289 11.3226 23.7257C11.7097 23.8225 12.0968 23.7257 12.2903 23.3386L13.1613 21.6934C13.9355 20.4354 15 19.6612 16.2581 19.6612ZM24 0.499878C10.7419 0.499878 0 11.2418 0 24.4999C0 37.7579 10.7419 48.4999 24 48.4999C37.2581 48.4999 48 37.7579 48 24.4999C48 11.2418 37.2581 0.499878 24 0.499878ZM24 45.4031C12.3871 45.4031 3.09677 36.1128 3.09677 24.4999C3.09677 12.9837 12.3871 3.59665 24 3.59665C35.5161 3.59665 44.9032 12.9837 44.9032 24.4999C44.9032 36.1128 35.5161 45.4031 24 45.4031ZM31.7419 15.9837C29.4194 15.9837 26.6129 18.887 26.3226 22.9515C26.2258 23.3386 26.5161 23.6289 26.8064 23.7257C27.1935 23.8225 27.5806 23.7257 27.7742 23.3386L28.6452 21.6934C29.4194 20.4354 30.4839 19.6612 31.7419 19.6612C32.9032 19.6612 33.9677 20.4354 34.7419 21.6934L35.7097 23.3386C35.9032 23.7257 36.2903 23.8225 36.5806 23.7257C36.871 23.6289 37.1613 23.3386 37.1613 22.9515C36.7742 18.887 33.9677 15.9837 31.7419 15.9837ZM32.7097 31.2741C30.4839 33.887 27.2903 35.3386 24 35.3386C20.6129 35.3386 17.4194 33.887 15.1935 31.2741C14.7097 30.5967 13.7419 30.5967 13.0645 31.0805C12.3871 31.6612 12.2903 32.6289 12.871 33.3063C15.5806 36.5966 19.6452 38.4354 24 38.4354C28.2581 38.4354 32.3226 36.5966 35.0323 33.3063C35.6129 32.6289 35.5161 31.6612 34.8387 31.0805C34.1613 30.5967 33.1935 30.5967 32.7097 31.2741Z"
					fill="#E27730"
					/>
				</svg>

				<h3>Distraction Free Landing Pages</h3>

				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
					hendrerit. Pellentesque aliquet nibh nec urna.
				</p>
			</div>

			<div class="remove-border-bottom">
				<svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg" >
					<path
					d="M24 0.499878C10.7419 0.499878 0 11.3386 0 24.4999C0 37.7579 10.7419 48.4999 24 48.4999C37.1613 48.4999 48 37.7579 48 24.4999C48 11.3386 37.1613 0.499878 24 0.499878ZM24 45.4031C12.4839 45.4031 3.09677 36.1128 3.09677 24.4999C3.09677 13.0805 12.3871 3.59665 24 3.59665C35.4194 3.59665 44.9032 12.9837 44.9032 24.4999C44.9032 36.016 35.5161 45.4031 24 45.4031ZM37.6452 18.887C38.129 18.4031 38.129 17.6289 37.6452 17.2418L36.871 16.3708C36.3871 15.887 35.6129 15.887 35.2258 16.3708L19.3548 32.0483L12.6774 25.3708C12.2903 24.887 11.5161 24.887 11.0323 25.3708L10.2581 26.145C9.77419 26.6289 9.77419 27.3063 10.2581 27.7902L18.5806 36.2096C18.9677 36.5966 19.7419 36.5966 20.2258 36.2096L37.6452 18.887Z"
					fill="#E27730"
					/>
				</svg>

				<h3>Distraction Free Landing Pages</h3>

				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
					hendrerit. Pellentesque aliquet nibh nec urna.
				</p>
			</div>
		</section>

		<section class="testimonials-div">
			<section class="testimonials">
				<div class="testimonial">
					<p>
					“The user interface is very smooth, and quite quick. It does open a
					separate screen for form creation and editing, but I suspect it does
					this to improve flow and speed.”
					</p>

					<div class="bottom">
					<span>- WebEndev</span>

					<div class="stars">★★★★★</div>
					</div>
				</div>

				<div class="testimonial">
					<p>
					““I don’t know why the existing form plugins never thought of
					templates. 99% of people installing this plugin want a simple
					contact form. Instead of you having to build it, you click the
					Simple Contact Form template and its built for you!””
					</p>

					<div class="bottom">
					<span>- Bill Erickson</span>

					<div class="stars">★★★★★</div>
					</div>
				</div>

				<div class="testimonial">
					<p>
					“I’ve used this plugin on several sites Ive built and its perfect
					easty to use, and just works. Very grateful that this plugin
					exists.”
					</p>

					<div class="bottom">
					<span>- LouisePKelly</span>

					<div class="stars">★★★★★</div>
					</div>
				</div>
			</section>

			<div class="buttons">
				<button class="light">Try the Demo</button>

				<button class="orange">Get WPForms Now</button>
			</div>
		</section>

		<section class="control">
			<div class="container">
				<div class="control__image">
					<img src="<?php echo $screenshot_1_url; ?>" alt="Form Page Screenshot" />
				</div>

				<div class="control__content">
					<h2>Gain Control of Your Forms</h2>

					<p>
					The biggest challenge with WordPress forms until now<br />

					has been that all form layouts are controlled by<br />

					WordPress themes, and most themes simply don’t<br />

					prioritize form layouts. And worst, a lot of them lack the<br />

					ability to create custom landing pages. WPForms Form<br />

					Pages addon fixes this problem, so you don’t have to<br />

					settle for mediocre form layouts and low form<br />

					conversions… With Form Pages, you can instantly create<br />

					a custom landing page for any of your WordPress forms<br />

					by simply enabling the Form Page Mode from your Form<br />

					Settings. You can add your logo, choose from two<br />

					different high-converting form styles, pick a color scheme<br />

					and that’s it. Your distraction-free custom form landing<br />

					page is ready to be shared.
					</p>
				</div>
			</div>
		</section>

		<div class="bg-white">
			<section class="formpages-feature">
				<div class="formpages-feature__image-wrap">
					<img src="<?php echo $screenshot_2_url; ?>" alt="Form Editor Left" />

					<img src="<?php echo $screenshot_3_url; ?>" alt="Form Settings Right" />
				</div>

				<p class="formpages-feature__text">
					Form Pages by WPForms is an exceptional Google Forms alternative for
					WordPress, and <br />

					you can use it to create custom landing pages for:
				</p>
			</section>

			<section>
				<section class="features">
					<div class="remove-border-bottom">
					<svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg" >
						<path
						d="M44.1667 6H5.16666C2.63541 6 0.666656 8.0625 0.666656 10.5V37.5C0.666656 40.0312 2.63541 42 5.16666 42H44.1667C46.6042 42 48.6667 40.0312 48.6667 37.5V10.5C48.6667 8.0625 46.6042 6 44.1667 6ZM5.16666 9H44.1667C44.9167 9 45.6667 9.75 45.6667 10.5V14.4375C43.6042 16.125 40.6042 18.5625 31.5104 25.7812C29.9167 27.0938 26.8229 30.0938 24.6667 30C22.4167 30.0938 19.3229 27.0938 17.7292 25.7812C8.63541 18.5625 5.63541 16.125 3.66666 14.4375V10.5C3.66666 9.75 4.32291 9 5.16666 9ZM44.1667 39H5.16666C4.32291 39 3.66666 38.3438 3.66666 37.5V18.2812C5.72916 20.0625 9.10416 22.7812 15.8542 28.125C17.8229 29.7188 21.1979 33.0938 24.6667 33C28.0417 33.0938 31.4167 29.7188 33.3854 28.125C40.1354 22.7812 43.5104 20.0625 45.6667 18.2812V37.5C45.6667 38.3438 44.9167 39 44.1667 39Z"
						fill="#E27730"
						/>
					</svg>

					<h3>Lead Generation</h3>

					<p>
						Make subscribing to your email list super simple for users by
						creating a webpage dedicated solely to signing up.
					</p>
					</div>

					<div class="remove-border-bottom">
					<svg width="48" height="49" viewBox="0 0 48 49" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M42.8571 0.657715H5.14286C2.25 0.657715 0 3.01486 0 5.80057V43.5149C0 46.4077 2.25 48.6577 5.14286 48.6577H42.8571C45.6429 48.6577 48 46.4077 48 43.5149V5.80057C48 3.01486 45.6429 0.657715 42.8571 0.657715ZM44.5714 43.5149C44.5714 44.4791 43.7143 45.2291 42.8571 45.2291H5.14286C4.17857 45.2291 3.42857 44.4791 3.42857 43.5149V5.80057C3.42857 4.94343 4.17857 4.08629 5.14286 4.08629H42.8571C43.7143 4.08629 44.5714 4.94343 44.5714 5.80057V43.5149ZM14.5714 21.2291H12.8571C12.3214 21.2291 12 21.6577 12 22.0863V37.5149C12 38.0506 12.3214 38.372 12.8571 38.372H14.5714C15 38.372 15.4286 38.0506 15.4286 37.5149V22.0863C15.4286 21.6577 15 21.2291 14.5714 21.2291ZM24.8571 10.9434H23.1429C22.6071 10.9434 22.2857 11.372 22.2857 11.8006V37.5149C22.2857 38.0506 22.6071 38.372 23.1429 38.372H24.8571C25.2857 38.372 25.7143 38.0506 25.7143 37.5149V11.8006C25.7143 11.372 25.2857 10.9434 24.8571 10.9434ZM35.1429 28.0863H33.4286C32.8929 28.0863 32.5714 28.5149 32.5714 28.9434V37.5149C32.5714 38.0506 32.8929 38.372 33.4286 38.372H35.1429C35.5714 38.372 36 38.0506 36 37.5149V28.9434C36 28.5149 35.5714 28.0863 35.1429 28.0863Z"
						fill="#E27730"
						/>
					</svg>

					<h3>Surveys</h3>

					<p>
						Whether it be a survey to gauge customer loyalty, an employee
						satisfaction survey, or an event feedback form, having a webpage
					</p>
					</div>

					<div class="remove-border-bottom">
					<svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
						d="M36.3333 0H12.3333C8.95825 0 6.33325 2.71875 6.33325 6V42C6.33325 45.375 8.95825 48 12.3333 48H36.3333C39.6145 48 42.3333 45.375 42.3333 42V6C42.3333 2.71875 39.6145 0 36.3333 0ZM39.3333 42C39.3333 43.6875 37.927 45 36.3333 45H12.3333C10.6458 45 9.33325 43.6875 9.33325 42V6C9.33325 4.40625 10.6458 3 12.3333 3H36.3333C37.927 3 39.3333 4.40625 39.3333 6V42ZM19.8333 9H28.8333C29.5833 9 30.3333 8.34375 30.3333 7.5C30.3333 6.75 29.5833 6 28.8333 6H19.8333C18.9895 6 18.3333 6.75 18.3333 7.5C18.3333 8.34375 18.9895 9 19.8333 9ZM24.3333 28.5C28.4583 28.5 31.8333 25.2188 31.8333 21C31.8333 16.875 28.4583 13.5 24.3333 13.5C20.1145 13.5 16.8333 16.875 16.8333 21C16.8333 25.2188 20.1145 28.5 24.3333 28.5ZM24.3333 16.5C26.7708 16.5 28.8333 18.5625 28.8333 21C28.8333 23.5312 26.7708 25.5 24.3333 25.5C21.802 25.5 19.8333 23.5312 19.8333 21C19.8333 18.5625 21.802 16.5 24.3333 16.5ZM28.6458 30C26.8645 30 26.3958 30.6562 24.3333 30.6562C22.177 30.6562 21.7083 30 19.927 30C17.9583 30 15.9895 30.9375 14.8645 32.625C14.2083 33.6562 13.8333 34.7812 13.8333 36.0938V39.75C13.8333 40.2188 14.1145 40.5 14.5833 40.5H16.0833C16.4583 40.5 16.8333 40.2188 16.8333 39.75V36.0938C16.8333 34.7812 17.677 33 19.927 33C21.052 33 21.8958 33.6562 24.3333 33.6562C26.677 33.6562 27.5208 33 28.6458 33C30.9895 33 31.8333 34.7812 31.8333 36.0938V39.75C31.8333 40.2188 32.1145 40.5 32.5833 40.5H34.0833C34.4583 40.5 34.8333 40.2188 34.8333 39.75V36.0938C34.8333 34.7812 34.3645 33.6562 33.7083 32.625C32.5833 30.9375 30.6145 30 28.6458 30Z"
						fill="#E27730"
						/>
					</svg>

					<h3>Membership Sites</h3>

					<p>
						Create a form landing web page on your site with user registration
						and login forms, making it easier on people to sign up and login
						to your
					</p>
					</div>
				</section>

				<p class="formpages-feature__text">
					We took the pain out of creating form landing pages and made it easy.
				</p>

				<div class="formpages-cta">
					<span>What are you waiting for?</span>

					<a href="#" class="formpages-cta__link" >Create custom form landing pages with WPForms today!</a>
				</div>
			</section>
		</div>
	</div>
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'landing-page', 'am_landing_page_shortcode' );



