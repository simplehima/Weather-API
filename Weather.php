<?php
// Weather.php
require_once 'config.php';

class Weather {
    private $apiKey;

    public function __construct() {
        $this->apiKey = API_KEY;
    }

    public function getWeather($country) {
        $url = API_URL . "?q=$country&appid=$this->apiKey&units=metric";
        
        // Use cURL for better error handling
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if (!$response) {
            return ['cod' => '400', 'message' => 'Failed to fetch weather data'];
        }

        return json_decode($response, true);
    }

    public function displayWeather($data) {
        if ($data['cod'] != 200) {
            return "<p>Error: " . $data['message'] . "</p>";
        }
    
        $weather = $data['weather'][0]['main'];
        $temp = $data['main']['temp'];
        $humidity = $data['main']['humidity'];
        $country = $data['name'];
        $sunrise = $data['sys']['sunrise'];
        $sunset = $data['sys']['sunset'];
        $currentTime = time();
    
        // Determine if it's day or night
        $isDay = ($currentTime > $sunrise && $currentTime < $sunset);
    
        $output = "<h2>Weather in $country</h2>";
        $output .= "<p><strong>Temperature:</strong> $temp °C</p>";
        $output .= "<p><strong>Humidity:</strong> $humidity%</p>";
        $output .= "<p><strong>Condition:</strong> $weather</p>";
    
        // Add dynamic effects based on weather and time of day
        $output .= "<style>";
        switch (strtolower($weather)) {
            case 'rain':
                if ($isDay) {
                    $output .= "body { background: url('Gifs/rain-day.gif'); color: white; }";
                } else {
                    $output .= "body { background: url('Gifs/rain-night.gif'); color: white; }";
                }
                break;
            case 'clear':
                if ($isDay) {
                    $output .= "body { background: url('Gifs/sunny.gif'); color: black; }";
                } else {
                    $output .= "body { background: url('Gifs/night.gif'); color: white; }";
                }
                break;
            case 'clouds':
                if ($isDay) {
                    $output .= "body { background: url('Gifs/cloudy-day.gif'); color: gray; }";
                } else {
                    $output .= "body { background: url('Gifs/cloudy-night.gif'); color: white; }";
                }
                break;
            default:
                if ($isDay) {
                    $output .= "body { background: #f0f0f0; color: black; }";
                } else {
                    $output .= "body { background: #333; color: white; }";
                }
                break;
        }
        $output .= "</style>";
    
        return $output;
    }
}
?>