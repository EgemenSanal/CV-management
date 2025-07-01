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
            margin-bottom: 12px;
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
        {{ $cv->email ?? '-' }} | {{ $cv->phoneNumber ?? '-' }} | {{ $cv->cityLiving ?? '-' }}, {{ $cv->countryLiving ?? '-' }}
    </div>

    <!-- Career Summary -->
    <div class="section">
        <h2>CAREER SUMMARY</h2>
        <p>{{ $cv->summary ?? 'Özet bilgi belirtilmemiş.' }}</p>
    </div>

    <!-- Education -->
    @if (!empty($cv->educations))
        <div class="section">
            <h2>EDUCATION</h2>
            @foreach ($cv->educations as $edu)
                @php
                    $isEmpty = collect($edu)->filter(function ($val) {
                        return trim($val) !== '';
                    })->isEmpty();
                @endphp

                @if (!$isEmpty)
                    <div class="item">
                        <div class="item-title">{{ $edu['degree'] ?? '-' }} - {{ $edu['institution'] ?? '-' }}</div>
                        <div>{{ $edu['city'] ?? '-' }}, {{ $edu['country'] ?? '-' }} | {{ $edu['start'] ?? '-' }} - {{ $edu['end'] ?? '-' }}</div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

    <!-- Experience -->
    @if (!empty($cv->experiences))
        <div class="section">
            <h2>EXPERIENCE</h2>
            @foreach ($cv->experiences as $exp)
                @php
                    $isEmpty = collect($exp)->filter(function ($val) {
                        return trim($val) !== '';
                    })->isEmpty();
                @endphp

                @if (!$isEmpty)
                    <div class="item">
                        <div class="item-title">{{ $exp['title'] ?? '-' }} - {{ $exp['company'] ?? '-' }}</div>
                        <div>{{ $exp['city'] ?? '-' }}, {{ $exp['country'] ?? '-' }} | {{ $exp['start'] ?? '-' }} - {{ $exp['end'] ?? '-' }}</div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

    <!-- Skills -->
    @if (!empty($cv->skills))
        <div class="section">
            <h2>TECHNICAL SKILLS</h2>
            <ul class="skills">
                @foreach ($cv->skills as $skill)
                    @if (trim($skill) !== '')
                        <li>{{ $skill }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>
