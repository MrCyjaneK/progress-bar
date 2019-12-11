<?php
header('Content-Type: image/svg+xml');
/*
def get_progress_color(progress, scale):
    ratio = progress / scale

    if ratio < 0.3:
        return "#d9534f"
    if ratio < 0.7:
        return "#f0ad4e"

    return "#5cb85c"
*/
function get_progress_color($progress, $scale) {
    $ratio = $progress / $scale;
    if ($ratio < 0.3) {
        return "#d9534f";
    } elseif ($ratio < 0.7) {
        return "#f0ad4e";
    }
    return "#5cb85c";
}
/*
def get_template_fields(progress):
    title = request.args.get("title")

    scale = 100
    try:
        scale = int(request.args.get("scale"))
    except (TypeError, ValueError):
        pass

    progress_width = 60 if title else 90
    try:
        progress_width = int(request.args.get("width"))
    except (TypeError, ValueError):
        pass

    return {
        "title": title,
        "title_width": 10 + 6 * len(title) if title else 0,
        "title_color": request.args.get("color", "428bca"),
        "scale": scale,
        "progress": progress,
        "progress_width": progress_width,
        "progress_color": get_progress_color(progress, scale),
        "suffix": request.args.get("suffix", "%"),
    }
*/
function get_template_fields($progress) {
    $title          = isset($_GET['title']) ? $_GET['title'] : null;
    $title_width    = isset($_GET['title']) ? 10 + 6 * strlen($_GET['title']) : 0;
    $title_color    = isset($_GET['title_color']) ? $_GET['title_color'] : '#428bca';
    $scale          = isset($_GET['scale']) && intval($_GET['scale']) > 0 ? intval($_GET['scale']) : 100;
    $progress       = intval($_GET['progress']) >= 0 ? intval($_GET['progress']) : 0;
    $progress_width = isset($_GET['width']) ? $_GET['width'] : null;
    $progress_width = !empty($progress_width) ? $progress_width : 90;
    $progress_color = get_progress_color($progress,$scale);
    $suffix         = isset($_GET['suffix']) ? $_GET['suffix'] : '%';
    return [
        'title'          => $title,
        'title_width'    => $title_width,
        'title_color'    => $title_color,
        'scale'          => $scale,
        'progress'       => $progress,
        'progress_width' => $progress_width,
        'progress_color' => $progress_color,
        'suffix'         => $suffix
    ];
}
/*
@app.route("/<int:progress>/")
def get_progress_svg(progress):
    template_fields = get_template_fields(progress)

    template = render_template("progress.svg", **template_fields)

    response = make_response(template)
    response.headers["Content-Type"] = "image/svg+xml"
    return response
*/

$t = get_template_fields($_GET['progress']);
include './templates/progress.php';


/*
@app.route("/")
def redirect_to_github():
    return redirect("https://github.com/fredericojordan/progress-bar", code=302)


if __name__ == "__main__":
    port = int(os.environ.get("PORT", 5000))
    app.run(host="0.0.0.0", port=port)
*/