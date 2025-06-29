<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $cv->firstName }} {{ $cv->lastName }} - CV</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            font-size: 12px;
            color: #000;
        }

        h1 {
            font-size: 20px;
            margin-bottom: 0;
        }

        h2 {
            font-size: 14px;
            margin-top: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
        }

        .contact {
            font-size: 10px;
            color: #555;
            margin-top: 4px;
        }

        .section {
            margin-top: 20px;
        }

        .item {
            margin-bottom: 10px;
        }

        .item-title {
            font-weight: bold;
        }

        .skills {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .skills li {
            display: inline-block;
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <h1>{{ strtoupper($cv->firstName . ' ' . $cv->lastName) }}</h1>
    <div class="contact">
        {{ $cv->email ?? 'E-mail belirtilmemiş' }} |
        City, Country |
        LinkedIn | Phone
    </div>

    <!-- Career Summary -->
    <div class="section">
        <h2>CAREER SUMMARY</h2>
        <p>{{ $cv->summary ?? 'Özet bilgi belirtilmemiş.' }}</p>
    </div>

    <!-- Education -->
    @if (!empty($cv->educations))
        <div class="section">
            <h2>EDUCATION AND CERTIFICATION</h2>
            @foreach ($cv->educations as $edu)
                <div class="item">
                    <div class="item-title">{{ $edu }}</div>
                    <div class="item-detail">College, University, Location – Date</div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Skills -->
    @if (!empty($cv->skills))
        <div class="section">
            <h2>TECHNICAL SKILLS</h2>
            <ul class="skills">
                @foreach ($cv->skills as $skill)
                    <li>{{ $skill }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Work Experience -->
    @if (!empty($cv->experiences))
        <div class="section">
            <h2>WORK EXPERIENCE</h2>
            @foreach ($cv->experiences as $exp)
                <div class="item">
                    <div class="item-title">Your Job Position | Company, Location</div>
                    <div class="item-detail">Date – Present</div>
                    <ul>
                        <li>{{ $exp }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    @endif

</body>
</html>
