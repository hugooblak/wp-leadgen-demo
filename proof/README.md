# Test results

**Test setup:** WordPress 6.6 (RC3) with the SQLite database plugin, PHP 8.4 built-in server, Chromium. Fresh install, then `content/setup.php`, the same steps the Playground blueprint runs. Date: 16 September 2026.

## Lighthouse (mobile setting)

| Page | Speed | Accessibility | Best practices | SEO | Largest paint | Layout shift | Page weight | Requests |
|---|---|---|---|---|---|---|---|---|
| Home | 96 | 100 | 100 | 100 | 2.5 s | 0 | 204 KB | 22 |
| Roof replacement | 97 | 100 | 100 | 100 | 2.4 s | 0 | 196 KB | 20 |
| Storm damage | 97 | 100 | 100 | 100 | 2.3 s | 0 | 188 KB | 18 |
| Free quote | 100 | 100 | 100 | 100 | 1.5 s | 0 | 94 KB | 9 |
| Thank you | 100 | 100 | 100 | 69 | 1.4 s | 0 | 77 KB | 8 |
| Guide article | 99 | 100 | 100 | 100 | 2.0 s | 0 | 142 KB | 10 |

Thank you scores 69 for SEO because it is set to `noindex` on purpose (it should never appear in Google).

Mobile setting means a simulated mid-range phone on a slow 4G connection. Full reports: [`lighthouse/`](lighthouse/) (open the `.html` files in a browser). Scores on a local server are a bit better than on real hosting; the page weight and request counts don't change.

## Accessibility (axe-core)

Rules: WCAG 2.0, 2.1 and 2.2 level A and AA, plus axe best practices. FAQs were opened before scanning so their answers were checked too.

- **0 issues** on 14 URLs at 1440px and 390px wide: home, both service pages, quote page (fresh and with the ZIP filled in), thank-you, About, FAQ, Privacy, guides list, two articles, 404, and home with CRO notes on.
- **0 issues** on step 4 of the quote form with all error messages showing, at both widths.
- Raw results: [`axe-results.json`](axe-results.json).

## Quote form (automated browser tests)

| Test | Result |
|---|---|
| Short form rejects a 4-digit ZIP, shows the message, focuses the field | Pass |
| Valid ZIP opens the quote page at step 2, "Step 2 of 4" | Pass |
| Tapping a choice card moves to the next step | Pass |
| Empty contact step: 3 messages, focus on first name | Pass |
| Message clears as soon as the field is fixed | Pass |
| UTM tags and Google click ID from the landing page are sent with the lead | Pass |
| Visitor lands on a blog post from an ad, then asks for a quote: the campaign is still sent | Pass |
| Thank-you page fires `generate_lead` once; refresh, or the same URL in another browser, doesn't fire it again | Pass |
| A made-up thank-you URL (`?lead=ok&ref=zzz999`) fires nothing | Pass |
| Thank-you page has `noindex` | Pass |
| Keyboard only: Enter moves on, arrow keys pick a choice without jumping ahead, Back works | Pass |
| Analytics events in order: start → step 1 → step 2 → error on step 3 | Pass |
| No JavaScript: all 4 questions show as one form | Pass |
| No JavaScript: missing answers → error summary, answers kept | Pass |
| With JavaScript, after a server error: opens the first step with a problem, focuses the summary, summary links open the right step | Pass |
| Bot submitting within 3 seconds: sent to thank-you, saved as *Suspected spam*, no email, no conversion event | Pass |
| Honeypot field filled: same | Pass |
| Choice steps show "Choosing an answer takes you to the next question" (only when the form is in steps) | Pass |
| No JavaScript errors in the console | Pass |

## Admin

| Test | Result |
|---|---|
| Leads list: columns, click-to-call phone, source, status, new-lead count on the menu | Pass |
| Lead detail: every captured field, consent text and time | Pass |
| Export CSV downloads with all fields | Pass |
| Author account: no Leads menu, list and export return 403. Editor account: can see and export | Pass |
| Dashboard "where to look" guide | Pass |
| Block editor: 12 pages and posts, 0 invalid blocks | Pass |
| All 25 theme patterns parse with 0 invalid blocks | Pass |
| Quote form block preview renders in the editor | Pass |

## Layout

- No sideways scrolling at 320, 375, 768, 820, 1024, 1280 and 1440px on 8 pages.
- Sticky call bar shows on phones and tablets (up to 959px) and slides away, hidden from keyboard and screen readers, while a form is on screen. From 960px the phone number is in the header.

## Setup

- `blueprint.json` passes the official Playground blueprint schema (`@wp-playground/blueprints` 3.1.54).
- A fresh install with the same steps gives all pages, the menu, 3 imported articles and 3 sample leads.
- Tested on WordPress 6.6 (RC3). The newest WordPress (which Playground uses) could not be downloaded on the test machine.

## Not tested here

- The live Playground link (the test machine can't reach playground.wordpress.net). Check it once the repo is pushed.
- Real email delivery. On a live site, add an SMTP plugin so lead alerts don't land in spam.
- Manual screen reader testing and real A/B tests.

## Screenshots

[`screenshots/`](screenshots/): home (desktop, mobile, full page), CRO notes, quote form steps (desktop, mobile, with errors), storm damage page, thank-you page, a migrated article, and the admin leads inbox, lead detail and dashboard guide.
