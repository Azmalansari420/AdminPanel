<!DOCTYPE html>
<html lang="en" >

<head>
  <?=$meta_data ?>

  <meta charset="UTF-8">

  <title>Welcome Page</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
  
<style>
@charset "UTF-8";
@import url("https://fonts.googleapis.com/css?family=Poppins:900&display=swap");
/**
 * * Title
 * * You can change the text styles to whatever you want ¯\_(ツ)_/¯
 * */
h1 {
  color: #FFFFFF;
  font-family: "Poppins", sans-serif;
  font-size: 80px;
  font-weight: 900;
  text-transform: uppercase;
  white-space: nowrap;
  opacity: 0;
}

::-moz-selection {
  background: black;
}

::selection {
  background: black;
}

/**
 * * Main
 * */
.page {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 0;
  min-height: 100vh;
  background-color: black;
  background-image: url("https://images.unsplash.com/photo-1544077960-604201fe74bc?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1920&h=1080&fit=crop&ixid=eyJhcHBfaWQiOjF9");
  background-position: center;
  background-size: cover;
  overflow: hidden;
}

/**
 * * Decorative vignette
 * */
.vignette {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: radial-gradient(rgba(0, 0, 0, 0), black);
  pointer-events: none;
  /*z-index: -1;*/
  opacity: 1;
  transition: opacity 350ms;
}
@media screen and (max-width: 900px) {
  .vignette {
    opacity: 0.8;
  }
}

/**
 * * Decorative lines
 * */
.lines {
  position: absolute;
  top: 0;
  bottom: 0;
  min-width: 960px;
  border-right: 1px solid black;
  border-left: 1px solid black;
  pointer-events: none;
}
.lines__inner, .lines::before {
  position: absolute;
  top: 0;
  left: 33%;
  bottom: 0;
  width: 33%;
}
.lines::before {
  content: "";
  border-right: 1px solid black;
  border-left: 1px solid black;
}
.lines__inner {
  box-shadow: 0 0 15px 5px black;
  opacity: 0;
}

/**
 * * Restart button
 * */
.restart {
  position: fixed;
  left: 50%;
  bottom: 20px;
  transform: translate(-50%, 0);
  width: 30px;
  height: 30px;
  background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'%3E%3Cpath fill='%23FFF' d='M133,440a35.37,35.37,0,0,1-17.5-4.67c-12-6.8-19.46-20-19.46-34.33V111c0-14.37,7.46-27.53,19.46-34.33a35.13,35.13,0,0,1,35.77.45L399.12,225.48a36,36,0,0,1,0,61L151.23,434.88A35.5,35.5,0,0,1,133,440Z'/%3E%3C/svg%3E") center/cover;
  border: none;
  outline: none;
  opacity: 0.15;
  cursor: pointer;
  transition: opacity 300ms;
}
.restart:hover {
  opacity: 1;
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no" >
  <!-- You can change the text to whatever you want ¯\_(ツ)_/¯ -->

<!-- BEGIN Page -->
<main class="page" id="js-page">
  <!-- BEGIN Title -->
  <h1 data-svg>Welcome </h1>
  <!-- END Title -->
  

  <!-- BEGIN Lines -->
  <div class="lines">
    <div class="lines__inner" id="js-lines"></div>
  </div>
  <!-- END Lines -->

  
  <!-- BEGIN Vignette -->
  <div class="vignette"></div>
  <!-- END Vignette -->
  
  
  <!-- BEGIN Restart animation -->
  <button class="restart" onClick="restart()"></button>
  <!-- END Restart animation -->
</main>
<!-- END Page -->
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenLite.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineLite.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/plugins/CSSPlugin.min.js'></script>
      <script id="rendered-js" >
/**
 * A simple plugin for text animation that can be easily used on any page
 * For better experience open in "Full Page View" - https://cdpn.io/janeRivas/debug/JjjYGQN/VJkxxOaZdQek
 * 
 * Thanks for the idea - <vintage.agency>
 * Made with ❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤❤ by janeRivas <solovyev.a@icloud.com>
 */
class SVG {
  /**
   * @param {HTMLElement} element - HTML element with text to be animated
   * @param {boolean} isStriped - make striped text (play with it ¯\_(ツ)_/¯)
   * @param {number} rectWidth - rectangle width
   */
  constructor(element, rectWidth = 20, isStriped = false) {
    this.svgStyles = this._getStyles(element);
    this.rectWidth = rectWidth;
    this.isStriped = isStriped;

    this._init(element);
  }

  /**
   * Initialization
   */
  _init(element) {
    const svg = this._createSVG();
    const text = this._createText();
    const { group, rects } = this._createRects();
    const mask = this._createMask();

    svg.appendChild(text);
    svg.appendChild(group);
    svg.appendChild(mask);
    element.insertAdjacentElement('afterend', svg);

    this._hideElement(element);

    this._initAnimation(text, rects);
  }

  /**
   * Starts the animation
   * @param {function} callback function
   */
  animate(fn) {
    this.animation.eventCallback('onComplete', fn);
    this.animation.play();
  }


  /**
   * Restarts the animation
   * @param {function} callback function
   */
  restart(fn) {
    this.animation.eventCallback('onComplete', fn);
    this.animation.restart();
  }

  /**
   * Gets CSS element properties
   * @param {HTMLElement} element - HTML element
   * @return {object} CSS styles
   */
  _getStyles(element) {
    const styles = window.getComputedStyle(element);

    return {
      text: element.innerText,
      width: styles.width.match(/\d+/)[0],
      height: styles.height.match(/\d+/)[0],
      fontFamily: styles.fontFamily,
      fontSize: styles.fontSize,
      fontWeight: styles.fontWeight,
      textTransform: styles.textTransform,
      color: styles.color,
      letterSpacing: styles.letterSpacing };

  }

  /**
   * Creates an SVG element
   * @return {HTMLElement} <svg> element
   */
  _createSVG() {
    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.setAttributeNS(null, 'width', this.svgStyles.width);
    svg.setAttributeNS(null, 'height', this.svgStyles.height);
    svg.setAttributeNS(null, 'viewBox', `0 0 ${this.svgStyles.width} ${this.svgStyles.height}`);

    return svg;
  }

  /**
   * Creates an SVG text element
   * @params {boolean} isMask - creates a mask from text
   * @return {HTMLElement} <text> element
   */
  _createText(isMask) {
    const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
    text.appendChild(document.createTextNode(this.svgStyles.text));
    text.setAttributeNS(null, 'x', '50%');
    text.setAttributeNS(null, 'y', '50%');
    text.setAttributeNS(null, 'font-family', this.svgStyles.fontFamily);
    text.setAttributeNS(null, 'font-size', this.svgStyles.fontSize);
    text.setAttributeNS(null, 'font-weight', this.svgStyles.fontWeight);
    text.setAttributeNS(null, 'letter-spacing', this.svgStyles.letterSpacing);
    if (isMask) {
      text.setAttributeNS(null, 'fill', this.svgStyles.color);
    } else {
      text.setAttributeNS(null, 'fill', 'none');
      text.setAttributeNS(null, 'stroke-dasharray', '1420');
      text.setAttributeNS(null, 'stroke-dashoffset', '1420');
      text.setAttributeNS(null, 'stroke-width', '1');
      text.setAttributeNS(null, 'stroke', this.svgStyles.color);
    }
    text.setAttributeNS(null, 'text-rendering', 'optimizeLegibility');
    text.setAttributeNS(null, 'dominant-baseline', 'middle');
    text.setAttributeNS(null, 'text-anchor', 'middle');

    return text;
  }

  /**
   * Creates an SVG mask element
   * @return {HTMLElement} <mask> element
   */
  _createMask() {
    const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
    const mask = document.createElementNS('http://www.w3.org/2000/svg', 'mask');
    const text = this._createText(true);

    mask.setAttributeNS(null, 'id', 'mask');
    mask.appendChild(text);
    defs.appendChild(mask);

    return defs;
  }

  /**
   * Creates a group of SVG rectangles
   * @return {object} <g> element and list of <rect> elements
   */
  _createRects() {
    const group = document.createElementNS('http://www.w3.org/2000/svg', 'g');
    const numberOfRect = this.svgStyles.width / this.rectWidth + this.svgStyles.height / this.rectWidth / 1.5;
    const rects = [];

    const rectHeight = parseInt(this.svgStyles.height) + this.rectWidth * 3;
    const stripe = this.rectWidth / 2;

    for (let i = 0; i < numberOfRect + 1; i++) {if (window.CP.shouldStopExecution(0)) break;
      const rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
      rect.setAttributeNS(null, 'x', i * this.rectWidth);
      rect.setAttributeNS(null, 'y', -20);
      /**
       * Hmmm... striped...
       */
      if (this.isStriped) {
        rect.setAttributeNS(null, 'width', stripe);
      } else {
        rect.setAttributeNS(null, 'width', this.rectWidth);
      }
      rect.setAttributeNS(null, 'height', rectHeight);
      rect.setAttributeNS(null, 'fill', this.svgStyles.color);

      rects.push(rect);
      group.appendChild(rect);
    }window.CP.exitedLoop(0);

    group.setAttributeNS(null, 'mask', 'url(#mask)');

    return { group, rects };
  }

  /**
   * Hides an element
   * @param {HTMLElement}
   */
  _hideElement(element) {
    element.style.display = 'none';
  }

  /**
   * Animation initialization
   * @param {HTMLElement} text - <text> element
   * @param {HTMLelement[]} rects - <rect> element
   */
  _initAnimation(text, rects) {
    TweenLite.set(rects, { rotation: 45, scaleX: 0 });

    this.animation = new TimelineLite({ paused: true });
    this.animation.to(text, 4, { strokeDashoffset: 0, ease: Power4.easeInOut });
    this.animation.to(rects, 1, { scaleX: 1, ease: Power1.easeIn }, 1.1);
  }}



/**
 * Line animation
 */
const tlLines = new TimelineLite();
tlLines.to('#js-lines', 1, { opacity: 1, ease: Power1.easeOut, delay: 1.6 });


/**
 * Init
 */
const svg = new SVG(document.querySelector('[data-svg]'));
svg.animate(() => {
  window.console.log('done');
});


/**
 * Restart animation
 */
const restart = () => {
  svg.restart(() => {
    window.console.log('done');
  });

  tlLines.restart();
};




/**
 * Just in case of slow internet
 */
// const img = new Image()
// img.src = 'https://images.unsplash.com/photo-1544077960-604201fe74bc?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1920&h=1080&fit=crop&ixid=eyJhcHBfaWQiOjF9'
// img.src = 'https://images.unsplash.com/photo-1525145770691-1eaa1d9a3147?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1920&h=1080&fit=crop&ixid=eyJhcHBfaWQiOjF9'

// img.onload = function() {
//   document.getElementById('js-page').style.backgroundImage = `url(${this.src}`

//   svg.animate(() => {
//     window.console.log('done')
//   })

//   TweenLite.to('#js-lines', 1, {opacity: 1, ease: Power1.easeOut, delay: 1.6 })
// }
//# sourceURL=pen.js
    </script>

  

</body>

</html>
 
