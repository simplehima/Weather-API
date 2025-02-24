

# Weather App 🌦️

```markdown
A dynamic weather application that displays real-time temperature, humidity, and weather conditions. Changes background effects based on weather (rain, sun, clouds) and time of day (day/night). Built with PHP (OOP) and OpenWeatherMap API.

## Features
- 🌞 Day/Night mode (auto-detected via sunrise/sunset times)
- 🌧️ Dynamic weather effects (rain, clear sky, clouds)
- 📱 Responsive design
- 🔍 Error handling for invalid locations

## Technologies
- PHP 7.4+ (OOP)
- HTML/CSS
- OpenWeatherMap API

## Setup

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/weather-app.git
cd weather-app
```

### 2. Configure API Key
1. **Get API Key**: Sign up at [OpenWeatherMap](https://openweathermap.org/api) (free tier).
2. **Rename Config File**:
   ```bash
   mv config-example.php config.php
   ```
3. **Add Key**: Open `config.php` and replace `your_api_key_here` with your actual key:
   ```php
   define('API_KEY', 'your_api_key_here');
   ```

### 3. Run Locally
1. Place the project in your web server (e.g., XAMPP `htdocs`).
2. Start Apache/PHP server.
3. Visit: `http://localhost/weather-app`

### 4. Add Background Media
Create/download these files (or modify code to match your filenames):
- `rain-day.gif`, `rain-night.gif`
- `sunny.jpg`, `night.jpg`
- `cloudy-day.jpg`, `cloudy-night.jpg`

## Folder Structure
```
weather-app/
├── index.php
├── Weather.php
├── config.php
├── config-example.php
├── styles.css
├── README.md
└── (media files)
```

## Usage
1. Enter a city/country (e.g., "Tokyo" or "Egypt").
2. Click "Get Weather".
3. See temperature, humidity, and dynamic background!

## Example Output
```plaintext
Weather in Egypt
Temperature: 22 °C
Humidity: 65%
Condition: Clear (Night Theme)
```

## Troubleshooting
- **401 Error**: Invalid API key → Recheck `config.php`.
- **City Not Found**: Ensure spelling (e.g., "New York" not "NewYork").
- **Missing Backgrounds**: Add images/GIFs or update CSS in `Weather.php`.

## Contributing
1. Fork the repository.
2. Create a branch: `git checkout -b feature/new-feature`.
3. Commit changes: `git commit -m 'Add feature'`.
4. Push: `git push origin feature/new-feature`.
5. Open a pull request.

## License
MIT License. See [LICENSE](LICENSE).

---
