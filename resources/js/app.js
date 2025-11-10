import './bootstrap';

// Import PrismJS core
import Prism from 'prismjs';

// Import Coy theme CSS
import 'prismjs/themes/prism-coy.css';

// Import common languages
import 'prismjs/components/prism-javascript';
import 'prismjs/components/prism-typescript';
import 'prismjs/components/prism-jsx';
import 'prismjs/components/prism-tsx';
import 'prismjs/components/prism-css';
import 'prismjs/components/prism-scss';
import 'prismjs/components/prism-python';
import 'prismjs/components/prism-java';
import 'prismjs/components/prism-php';
import 'prismjs/components/prism-php-extras';
import 'prismjs/components/prism-bash';
import 'prismjs/components/prism-json';
import 'prismjs/components/prism-markdown';
import 'prismjs/components/prism-sql';
import 'prismjs/components/prism-yaml';

// Make Prism available globally
window.Prism = Prism;

// Auto-highlight code blocks on page load
document.addEventListener('DOMContentLoaded', () => {
    Prism.highlightAll();
});
