Here is the complete README.md file ready to copy-paste:

# Hamburger Sidebar Widget for Elementor

A lightweight, customizable Elementor widget that adds a responsive hamburger menu button with a smooth slide-in sidebar panel. Supports nested submenus with accordion behavior, custom logos, and full Elementor template integration.

**Live Demo:** [digitalfoundrynk.com](https://digitalfoundrynk.com)

---

## Features

- **Hamburger Toggle Button** — Fully styleable via Elementor controls (size, background, line color)
- **Slide-In Sidebar Panel** — Fixed off-canvas drawer with overlay, smooth CSS transitions
- **Logo Support** — Upload a custom logo or fallback to site name
- **WordPress Menu Integration** — Select any registered nav menu
- **Elementor Template Support** — Inject any saved Elementor template below the menu
- **Nested Submenus** — Accordion-style expand/collapse with animated carets
- **Responsive Behavior**
  - **Desktop:** Hover to reveal submenus, click parent links to navigate
  - **Mobile:** Tap to toggle submenus, accordion closes siblings automatically
- **Accessibility** — ARIA labels, keyboard navigation (Escape to close), focus management
- **Zero Dependencies** — Pure vanilla JavaScript, no jQuery required

---

## Requirements

- WordPress 5.0+
- Elementor 3.0+
- PHP 7.4+

## Usage

### Content Tab

| Control | Description |
|---------|-------------|
| **Logo** | Upload an image logo (optional) |
| **Select Menu** | Choose a registered WordPress nav menu |
| **Additional Template** | Inject any saved Elementor template below the menu |

### Style Tab

| Section | Controls |
|---------|----------|
| **Logo Style** | Width, margin |
| **Hamburger Button** | Background color, line color, size |
| **Main Menu & Caret** | Layout (vertical/horizontal), margin, gap, padding, typography, colors, borders, caret icons |
| **Sub Menu** | Indent, gap, padding, typography, colors, background |
| **Sidebar Panel** | Background color, padding, z-index |

---

## File Structure

```
hamburger-sidebar-widget/
├── hamburger-sidebar-widget.php   # Main plugin file
├── class-widget.php               # Elementor widget class
├── hamburger-sidebar.css          # Frontend styles
└── hamburger-sidebar.js           # Frontend scripts
```

---

## Changelog

### 1.0.0
- Initial release

---

## Credits

Developed by [Nabil Ahmad](https://nabilahmad.com)

---

## License

GPL v2 or later
